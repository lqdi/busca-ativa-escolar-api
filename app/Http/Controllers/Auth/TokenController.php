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
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class TokenController extends BaseController  {

	public function authenticate(Request $request) {

		if(request('grant_type', 'login') == "refresh") {
			return $this->refresh($request);
		}

		$credentials = $request->only('email', 'password');

		try {

			$access_token = JWTAuth::attempt($credentials);
			$refresh_token = "not_implemented";

			if (!$access_token) return response()->json(['error' => 'invalid_credentials'], 401);

			$user = Auth::user();


		} catch (JWTException $ex) {

			return response()->json(['error' => 'token_generation_failed', 'reason' => $ex->getMessage()], 500);

		}

		return response()->json(compact('access_token', 'refresh_token', 'user'));
	}

	public function refresh(Request $request) {

		// TODO: validate token; check against blacklist
		// TODO: return new access JWT
		// @see JWTAuth::refresh()

		throw new \Exception("not_implemented");
	}

	public function identity() {

		$user = Auth::user();

		return response()->json(compact('user'));

	}

}