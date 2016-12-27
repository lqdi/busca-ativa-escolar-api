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

		$credentials = $request->only('email', 'password');

		try {

			$token = JWTAuth::attempt($credentials);

			if (!$token) return response()->json(['error' => 'invalid_credentials'], 401);

		} catch (JWTException $ex) {

			return response()->json(['error' => 'token_generation_failed', 'reason' => $ex->getMessage()], 500);

		}

		return response()->json(compact('token'));
	}

	public function profile() {

		$user = Auth::user();

		return response()->json(compact('user'));

	}

}