<?php
/**
 * busca-ativa-escolar-api
 * TenantScoped.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 22/12/2016, 21:22
 */

namespace BuscaAtivaEscolar\Traits\Data;

trait checkPhases
{
    public static function checkIfExists($userId)
    {
        $query = self::query()
            ->where('assigned_user_id', '=', $userId)
            ->where('is_completed', '=', 0)
            ->count();
        $result = new \stdClass();
        if ($query > 0) {
            $result->check = true;
            $result->count = $query;
        }
        return $result;
    }
}