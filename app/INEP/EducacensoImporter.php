<?php
/**
 * busca-ativa-escolar-api
 * EducacensoImporter.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2018
 *
 * @author Aryel Tupinamba <aryel.tupinamba@lqdi.net>
 *
 * Created at: 05/03/2018, 16:21
 */

namespace BuscaAtivaEscolar\INEP;


use BuscaAtivaEscolar\Attachment;
use BuscaAtivaEscolar\CaseSteps\Pesquisa;
use BuscaAtivaEscolar\Child;
use BuscaAtivaEscolar\Comment;
use BuscaAtivaEscolar\Data\AlertCause;
use BuscaAtivaEscolar\Tenant;
use BuscaAtivaEscolar\User;
use Carbon\Carbon;
use Excel;
use Log;

class EducacensoImporter {

	public $tenant;
	public $file;

	private $agent;

	public function __construct(Tenant $tenant, $file) {
		$this->tenant = $tenant;
		$this->file = $file;

		$this->agent = User::find(User::ID_EDUCACENSO_BOT);

		if(!$this->agent) {
			throw new \Exception("Failed to find Educacenso bot user!");
		}
	}

	public function process() {

		Log::debug("[educacenso_import] Tenant {$this->tenant->name}, file {$this->file}");

		Excel::selectSheetsByIndex(0)->load($this->file, function ($reader) { /* @var $reader \Maatwebsite\Excel\Readers\LaravelExcelReader */
			$reader->noHeading(true);

			$fieldMap = null;

			Log::debug("[educacenso_import] Looking for data block begin...");

			foreach($reader->get() as $rowNumber => $row) {

				$firstColumn = $row->first();

				// Lines before the "UF" header is found
				if ($fieldMap === null && trim($firstColumn) !== "UF") {
					Log::debug("[educacenso_import] \t Skip row {$rowNumber}, no 'UF' keyword found: [{$firstColumn}]");
					continue;
				}

				// Found "UF" header, so data block begins here
				if ($fieldMap === null && trim($firstColumn) === "UF") {
					$fieldMap = $row;

					Log::debug("[educacenso_import] \t Found UF keyword!");
					continue;
				}

				// Empty line, so the data block is over
				if(strlen(trim($firstColumn)) <= 0) {
					Log::debug("[educacenso_import] Found empty line in data block, block has closed!");
					break;
				}

				$mappedRow = collect($row)->mapWithKeys(function ($value, $index) use ($fieldMap) {
					if(!isset($fieldMap[$index])) return null;
					return [$fieldMap[$index] => $value];
				});

				Log::debug("[educacenso_import] Parsing child in row {$rowNumber}... ");

				$this->parseChildRow($mappedRow);

			}

			Log::debug("[educacenso_import] Completed parsing Sheet #0!");

		});

		$this->tenant->educacenso_import_details = [
			'has_imported' => true,
			'imported_at' => date('Y-m-d H:i:s'),
			'file' => $this->file
		];
		$this->tenant->save();

		Log::debug("[educacenso_import] Job completed!");

	}

	public function parseChildRow($row) {

		Log::debug("[educacenso_import] Bot Agent User: {$this->agent->id}, {$this->agent->name}");

		$placeKindMap = [
			'URBANA' => 'urban',
			'RURAL' => 'rural',
		];

		$fieldMap = [
			'Identificação única' => 'educacenso_id',
			'Nome do aluno' => 'name',
			'Data de nascimento' => 'dob',
			'Filiação 1' => 'mother_name',
			'Localização' => 'place_kind',
			'Código da escola' => 'school_last_id',
			'Nome da escola' => 'school_last_name',
		];

		$data = [];

		foreach($fieldMap as $xlsField => $systemField) {
			if(!isset($row[$xlsField])) continue;
			$data[$systemField] = $row[$xlsField];
		}

		$data['alert_cause_id'] = AlertCause::getBySlug('educacenso_inep')->id;

		$data['educacenso_id'] = strval($data['educacenso_id'] ?? "unkn_" . uniqid());
		$data['name'] = $data['name'] ?? "-- informação não disponível --";
		$data['dob'] = isset($data['dob']) ? Carbon::createFromFormat('d/m/Y', $data['dob'])->format('Y-m-d') : null;
		$data['mother_name'] = $data['mother_name'] ?? "-- informação não disponível --";
		$data['place_address'] = "-- informação não disponível --";
		$data['place_uf'] = $this->tenant->city->uf;
		$data['place_city_id'] = strval($this->tenant->city->id);
		$data['place_city_name'] = $this->tenant->city->name;
		$data['place_kind'] = isset($data['place_kind']) ? ($placeKindMap[$data['place_kind']] ?? null) : null;

		Log::debug("[educacenso_import] \t Parsed data: " . print_r($data, true));

		$child = Child::spawnFromAlertData($this->tenant, $this->agent->id, $data);

		Log::debug("[educacenso_import] \t Spawned child with ID: {$child->id}");

		$pesquisa = Pesquisa::fetchWithinCase($child->current_case_id, Pesquisa::class, 20);

		Log::debug("[educacenso_import] \t Found pesquisa: {$pesquisa->id}");

		$pesquisa->setFields($data);

		Log::debug("[educacenso_import] \t Posting comments...");

		Comment::post($child, $this->agent, "Caso importado na planilha do Educacenso");

		if(isset($row['Etapa de ensino'])) {
			Comment::post($child, $this->agent, "Última etapa de ensino: "  . $row['Etapa de ensino']);
		}

		Log::debug("[educacenso_import] \t Child spawn complete!");

	}

}