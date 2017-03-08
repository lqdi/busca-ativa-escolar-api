<?php
/**
 * busca-ativa-escolar-api
 * BaseController.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 22/12/2016, 21:01
 */

namespace BuscaAtivaEscolar\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Log;

class BaseController extends Controller {
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function api_exception(\Exception $exception) {

    	Log::warning('[api_exception] ' . $exception->getMessage());

	    $exceptionInfo = $exception->getMessage();

	    if(env('APP_DEBUG', false)) {
	    	$exceptionInfo = [
			    'message' => $exception->getMessage(),
			    'stack' => $exception->getTrace()
		    ];
	    }

    	return response()->json([
    		'status' => 'error',
		    'reason' => 'exception',
		    'exception' => $exceptionInfo
	    ], 500);
    }

	protected function api_failure($reason, $fields = null) {
		$data = ['status' => 'error', 'reason' => $reason];
		if($fields) $data['fields'] = $fields;
		return response()->json($data);
	}
}
