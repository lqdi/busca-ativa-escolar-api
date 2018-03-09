<?php
/**
 * busca-ativa-escolar-api
 * TestEducacensoImporter.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2018
 *
 * @author Aryel Tupinamba <aryel.tupinamba@lqdi.net>
 *
 * Created at: 05/03/2018, 16:24
 */

namespace BuscaAtivaEscolar\Console\Commands;


use BuscaAtivaEscolar\INEP\EducacensoImporter;
use BuscaAtivaEscolar\Tenant;

class TestEducacensoImporter extends Command {

	protected $signature = "maintenance:test_educacenso_importer";

	public function handle() {

		$file = storage_path('app/attachments/buscaativaescolar_tenant/b0838f00-cd55-11e6-b19b-757d3a457db3/3afd3b40-20a5-11e8-aca9-0bcfac720e2e.xls');
		$tenant = Tenant::find('b0838f00-cd55-11e6-b19b-757d3a457db3');

		$importer = new EducacensoImporter($tenant, $file);
		$importer->process();

	}


}