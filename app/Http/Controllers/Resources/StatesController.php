<?php
/**
 * busca-ativa-escolar-api
 * StatesController.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2018
 *
 * @author dfkimera
 *
 * Created at: 01/02/2018, 11:58
 */

namespace BuscaAtivaEscolar\Http\Controllers\Resources;


use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\Serializers\SimpleArraySerializer;
use BuscaAtivaEscolar\StateSignup;
use BuscaAtivaEscolar\Transformers\StateTransformer;
use BuscaAtivaEscolar\User;
use Carbon\Carbon;
use Excel;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class StatesController extends BaseController {

	public function all() {
		$max = intval(request('max', null));

		$filter = request('filter', []);
		$sort = request('sort', []);

		$states = StateSignup::query()
			->with(['admin', 'coordinator', 'users'])
			->where('is_approved', 1);
			//->whereNotNull('user_id');

		StateSignup::applySorting($states, $sort);

		if(isset($filter['uf']) && strlen($filter['uf']) > 0) {
			$states->where('uf', 'REGEXP', $filter['uf']);
		}

		if(isset($filter['name']) && strlen($filter['name']) > 0) {
			$states->where('name', 'REGEXP', $filter['name']);
		}

		if(isset($filter['admin']) && strlen($filter['admin']) > 0) {
			$states->whereHas('user', function ($sq) use ($filter) {
				return $sq->where('name', 'REGEXP', $filter['admin']);
			});
		}

		if(isset($filter['coordinator']) && strlen($filter['coordinator']) > 0) {
			$states->whereHas('user', function ($sq) use ($filter) {
				return $sq->where('name', 'REGEXP', $filter['coordinator']);
			});
		}

		if(isset($filter['users']) && strlen($filter['users']) > 0) {
			$states->whereHas('users', function ($sq) use ($filter) {
				return $sq->where('name', 'REGEXP', $filter['users']);
			});
		}

		if(isset($filter['created_at']) && strlen($filter['created_at']) > 0) {
			$numDays = intval($filter['created_at']);
			$cutoffDate = Carbon::now()->addDays(-$numDays);

			$states->where('created_at', '>=', $cutoffDate->format('Y-m-d H:i:s'));
		}

		if($this->currentUser()->isRestrictedToUF()) {
			$states->where('uf', $this->currentUser()->uf);
		}

		$states = ($max) ? $states->paginate($max) : $states->get();

		$results = fractal()
			->collection($states)
			->transformWith(new StateTransformer())
			->serializeWith(new SimpleArraySerializer())
			->parseIncludes(request('with'));

		if($max) {
			$results->paginateWith(new IlluminatePaginatorAdapter($states));
		}

		return $results->respond();
	}

    public function export() {
        $query = StateSignup::query()
            ->withTrashed()
            ->orderBy('uf', 'ASC');

        $states = $query
            ->get()
            ->map(function ($state) { /* @var $state StateSignup */
                return $state->toExportArray();
            })
            ->toArray();

        Excel::create('buscaativaescolar_states', function($excel) use ($states) {

            $excel->sheet('states', function($sheet) use ($states) {

                $sheet->setOrientation('landscape');
                $sheet->fromArray($states);

            });

        })->export('xls');
    }



}