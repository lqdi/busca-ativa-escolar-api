<?php

namespace BuscaAtivaEscolar\Http\Controllers\Resources;

use BuscaAtivaEscolar\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use BuscaAtivaEscolar\Attempt;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class AttemptsController extends BaseController
{
    /**
     * Método que cria o registro na tabela de tentativas o usuário que está
     * tenando logar na aplicação. 
     */
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
    public function updateAttempt(Request $request)
    {
        $user = Attempt::where('email', '=', $request->email)->first();
        if ($user) {
            $user->attempt = $user->attempt + 1;
            if ($user->attempt == 3) {
                $user->attempted_at = Carbon::now()->addSeconds(60)->toDateTimeString();
            } elseif ($user->attempt >= 4 && $user->attempt < 8) {
                $user->attempted_at = Carbon::now()->addSeconds(300 * ($user->attempt - 4 + 1))->toDateTimeString();
            } else if ($user->attempt >= 8) {
                $this->blockUser($request);
            }
            $user->save();
        }
    }
    public function eraseAttempt(Request $request)
    {
        Attempt::where('email', '=', $request->email)->first()->update([
            'attempt' => 0,
            'attempted_at' => null,
        ]);
    }
    public function blockUser(Request $request)
    {
        Attempt::where('email', '=', $request->email)->first()->update([
            'attempt' => 0,
            'attempted_at' => null,
            'blocked' => 1
        ]);
    }

    public function disblockUser(Request $request)
    {
        Attempt::where('email', '=', $request->email)->first()->update([
            'attempt' => 0,
            'attempted_at' => null,
            'blocked' => 0
        ]);
    }
}
