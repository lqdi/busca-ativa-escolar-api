<?php
/**
 * busca-ativa-escolar-api
 * AlertsController.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 09/02/2017, 19:57
 */

namespace BuscaAtivaEscolar\Http\Controllers\Resources;


use Auth;
use BuscaAtivaEscolar\Child;
use BuscaAtivaEscolar\Group;
use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\Serializers\SimpleArraySerializer;
use BuscaAtivaEscolar\Transformers\AgentAlertTransformer;
use BuscaAtivaEscolar\Transformers\PendingAlertTransformer;
use BuscaAtivaEscolar\User;
use Illuminate\Database\Query\Builder;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class AlertsController extends BaseController {

	public function get_pending() {

        /** @var Builder $query */
        $query = Child::with('alert');

        $where = [];

        if(request('show_suspended') == "true") {
            array_push($where, ['alert_status','=', 'rejected']);
        }else{
            array_push($where, ['alert_status','=', 'pending']);
        }


        //filter to name
        if(request()->has('name')) {
            array_push($where, ['name', 'LIKE', request('name').'%']);
        }

        $query->where($where);

        if(request()->has('sort')) {
            Child::applySorting($query, json_decode(request('sort'), true));
        }

        if(Auth::user()->type === User::TYPE_SUPERVISOR_INSTITUCIONAL) {
            $group = Auth::user()->group; /* @var $group Group */

            if(!$group) $group = Auth::user()->tenant->primary_group;
            if(!$group) $group = new Group();

            $query->whereHas('alert', function ($sq) use ($group) {
                $sq->whereIn('alert_cause_id', $group->getSettings()->getHandledAlertCauses());
            });
        }

        //filter to submitter_name
        if(request()->has('submitter_name')) {
            $query->whereHas('submitter', function ($sq) {
                $sq->where('name', 'LIKE', '%' . request('submitter_name') . '%');
            });
        }

        //define a pagination
        $max = request('max', 128);
        if($max > 128) $max = 128;
        if($max < 16) $max = 16;

        $paginator = $query->paginate($max);
        $collection = $paginator->getCollection();

        return fractal()
            ->collection($collection)
            ->transformWith(new PendingAlertTransformer())
            ->serializeWith(new SimpleArraySerializer())
            ->paginateWith(new IlluminatePaginatorAdapter($paginator))
            ->parseIncludes(request('with'))
            ->respond();
	}

	public function accept(Child $child) {
		try {
			if($child->alert_status != 'pending') {
				return response()->json(['status' => 'failed', 'reason' => 'not_pending']);
			}

			$child->acceptAlert(request()->all());

			return response()->json(['status' => 'ok']);

		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}
	}

	public function reject(Child $child) {
		try {
			if($child->alert_status != 'pending') {
				return response()->json(['status' => 'failed', 'reason' => 'not_pending']);
			}

			$child->rejectAlert();

			return response()->json(['status' => 'ok']);

		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}
	}

	public function get_mine() {
		$myAlerts = Child::with('alert')
			->orderBy('created_at', 'DESC')
			->where('alert_submitter_id', Auth::id())
			->get();

		return fractal()
			->collection($myAlerts)
			->transformWith(new AgentAlertTransformer())
			->serializeWith(new SimpleArraySerializer())
			->parseIncludes(request('with'))
			->respond();
	}

}