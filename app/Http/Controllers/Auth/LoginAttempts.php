<?php

namespace BuscaAtivaEscolar\Http\Controllers\Auth;

use BuscaAtivaEscolar\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use BuscaAtivaEscolar\User;
use Illuminate\Support\Carbon;

class LoginAttempts extends BaseController
{

    public function hasTooManyLoginAttempts(Request $request)
    {
        $user  = User::where('email', '=', $request->email)->first();
        if ($user->attempted_at) {
            if (Carbon::now()->lessThan(Carbon::parse($user->attempted_at)) == 1) {
                return true;
            }
        }
    }


    public function incrementLoginAttempts(Request $request)
    {
        $user  = User::where('email', '=', $request->email)->first();
        $user->attempt = $user->attempt + 1;
        if ($user->attempt == 3) {
            $user->attempted_at = Carbon::now()->addSeconds(60)->toDateTimeString();
        } elseif ($user->attempt == 4) {
            $user->attempted_at = Carbon::now()->addSeconds(300)->toDateTimeString();
        } else {
            if ($user->attempted_at >= 8) {
                $user->attempted_at = Carbon::now()->addYears(100)->toDateTimeString();
            }
            $user->attempted_at = Carbon::now()->addSeconds(300 * ($user->attempt - 4 + 1))->toDateTimeString();
        }
        $user->save();
    }

    public function clearLoginAttempts(Request $request)
    {
        $user  = User::where('email', '=', $request->email)->first();
        $user->attempt = 0;
        $user->attempted_at = null;
        $user->save();
    }
}
