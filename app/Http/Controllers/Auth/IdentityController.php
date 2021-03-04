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
use BuscaAtivaEscolar\User;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use BuscaAtivaEscolar\Http\Traits\ThrottlesLogin;

class IdentityController extends BaseController
{
	use ThrottlesLogins;
	protected $maxLoginAttempts = 3;
	protected $lockoutTime = 300;
	public function authenticate(Request $request)
	{
		if ($this->hasTooManyLoginAttempts($request)) {
			print_r('teste');
			$this->fireLockoutEvent($request);
			return $this->sendLockoutResponse($request);
		}
		$validation = $this->validate($request, [
			'email' => 'required|email',
			'password' => 'required|min:4'
		]);

		/** Validation is done, now login user */
		//else to user profile
		$check = Auth::attempt(['email' => $request['email'], 'password' => $request['password']]);

		if ($check) {

			$user = Auth::user();
			/** Since Authentication is done, Use it here */
			$this->clearLoginAttempts($request);
		} else {
			/** Authentication Failed */
			$this->incrementLoginAttempts($request);
			return response()->json(['error' => 'invalid_credentials'], 401);
		}

		if (request('grant_type', 'login') == "refresh") {
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
				->parseIncludes(['tenant'])
				->toArray();
		} catch (JWTException $ex) {

			return response()->json(['error' => 'token_generation_failed', 'reason' => $ex->getMessage()], 500);
		}

		$this->tickTenantLastActivity();

		return response()->json(compact('token', 'user'));
	}

	public function refresh(Request $request)
	{

		$token = $request->get('token', false);

		if (!$token) {
			return response()->json(['error' => 'no_token_provided'], 500);
		}

		try {
			$token = JWTAuth::refresh($token);
			$user = JWTAuth::toUser($token);
		} catch (JWTException $ex) {
			return response()->json(['error' => 'token_refresh_fail', 'reason' => $ex->getMessage()], 500);
		}

		$this->tickTenantLastActivity();


		return response()->json(compact('token', 'user'));
	}

	public function identity()
	{

		$user = Auth::user();

		$this->tickTenantLastActivity();

		return fractal()
			->item($user)
			->transformWith(new UserTransformer('long'))
			->serializeWith(new SimpleArraySerializer())
			->parseIncludes(request('with', 'tenant'))
			->respond();
	}

	public function begin_password_reset()
	{

		$email = request('email');

		try {

			// TODO: rate limiting

			$user = User::whereEmail($email)->first(); /* @var $user User */

			if (!$user) {
				return $this->api_failure('<br>O email (' . $email . ')<br> nao foi encontrado no sistema, <br>entre com o email cadastrado para acessar o sistema e trocar a senha.');
			}

			$user->sendPasswordResetNotification($user->getRememberToken());
		} catch (\Exception $ex) {

			$this->api_failure('reset_send_failed');
		}

		return $this->api_success();
	}

	public function complete_password_reset()
	{
		$email = request('email');
		$token = request('token');
		$newPassword = request('new_password');

		try {

			$user = User::whereEmail($email)->first(); /* @var $user User */

			if (!$user) {
				return $this->api_failure('invalid_email');
			}

			$user->resetPassword($token, $newPassword);
		} catch (\Exception $ex) {
			return $this->api_failure($ex->getMessage());
		}

		return $this->api_success();
	}
	/**
	 * Username used in ThrottlesLogins trait
	 * 
	 * @return string
	 */
	public function username()
	{
		return 'email';
	}
}
