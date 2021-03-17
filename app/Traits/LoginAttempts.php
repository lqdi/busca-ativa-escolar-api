<?php

namespace BuscaAtivaEscolar\Traits;

use BuscaAtivaEscolar\Attempt;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

trait LoginAttempts
{
  public function store(Request $request)
  {
    if ($this->inTable($request) == '') {
      Attempt::create([
        'id' => Str::uuid()->toString(),
        'email' => $request->email,
        'attempt' => 0,
        'blocked' => 0,
        'attempted_at' => null
      ]);
    }
  }

  public function inTable(Request $request)
  {
    return Attempt::where('email', '=', $request->email)->first();
  }
  public function incrementLoginAttempts($email)
  {
    $user = Attempt::where('email', '=', $email)->first();
    if ($user) {
      $user->attempt = $user->attempt + 1;
      if ($user->attempt == 3) {
        $user->attempted_at = Carbon::now()->addSeconds(60)->toDateTimeString();
      } elseif ($user->attempt >= 4 && $user->attempt < 8) {
        $user->attempted_at = Carbon::now()->addSeconds(300 * ($user->attempt - 4 + 1))->toDateTimeString();
      } else if ($user->attempt >= 8) {
        $this->blockUser($email);
      }
      $user->save();
    }
  }
  public function clearLoginAttempts($email)
  {
    Attempt::where('email', '=', $email)->first()->update([
      'attempt' => 0,
      'attempted_at' => null,
    ]);
  }
  public function blockUser($email)
  {
    Attempt::where('email', '=', $email)->first()->update([
      'attempt' => 0,
      'attempted_at' => null,
      'blocked' => 1
    ]);
  }

  public function disblockUser($email)
  {
    Attempt::where('email', '=', $email)->first()->update([
      'attempt' => 0,
      'attempted_at' => null,
      'blocked' => 0
    ]);
  }
  public function hasTooManyLoginAttempts(Request $request)
  {
    $user = $this->inTable($request);
    if ($user) {
      if ($user->attempted_at) {
        if (Carbon::now()->lessThan(Carbon::parse($user->attempted_at)) == 1) {
          return true;
        }
      }
    }
  }

  /*public function incrementLoginAttempts(Request $request)
  {
    $this->updateAttempt($request);
  }*/

  /*public function clearLoginAttempts($email)
  {
    $this->eraseAttempt($request);
  }*/
}
