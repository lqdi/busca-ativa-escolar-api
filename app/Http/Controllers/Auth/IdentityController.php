<?php
/**
 * busca-ativa-escolar-api
 * TokenController.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 22/12/2016, 21:01
 */

namespace BuscaAtivaEscolar\Http\Controllers\Auth;

use Auth;
use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\Serializers\SimpleArraySerializer;
use BuscaAtivaEscolar\Transformers\UserTransformer;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class IdentityController extends BaseController  {

	public function authenticate(Request $request) {

		if(request('grant_type', 'login') == "refresh") {
			return $this->refresh($request);
		}

		$credentials = $request->only('email', 'password');

		try {

			$token = JWTAuth::attempt($credentials);

			if (!$token) return response()->json(['error' => 'invalid_credentials'], 401);

			$user = fractal()
				->item(Auth::user())
				->transformWith(new UserTransformer('long'))
				->serializeWith(new SimpleArraySerializer())
				->toArray();


		} catch (JWTException $ex) {

			return response()->json(['error' => 'token_generation_failed', 'reason' => $ex->getMessage()], 500);

		}

		return response()->json(compact('token', 'user'));
	}

	public function refresh(Request $request) {

		$token = $request->get('token', false);

		if(!$token) {
			return response()->json(['error' => 'no_token_provided'], 500);
		}

		try {
			$token = JWTAuth::refresh($token);
		} catch (JWTException $ex) {
			return response()->json(['error' => 'token_refresh_fail', 'reason' => $ex->getMessage()], 500);
		}

		return response()->json(compact('token'));
	}

	public function identity() {

		$user = Auth::user();

		return fractal()
			->item($user)
			->transformWith(new UserTransformer('long'))
			->serializeWith(new SimpleArraySerializer())
			->parseIncludes(request('with'))
			->respond();

	}

}