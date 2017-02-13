<?php
/**
 * busca-ativa-escolar-api
 * TenantSettingsTransformer.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 13/02/2017, 19:56
 */

namespace BuscaAtivaEscolar\Transformers;


use BuscaAtivaEscolar\Settings\TenantSettings;
use League\Fractal\TransformerAbstract;

class TenantSettingsTransformer extends TransformerAbstract {

	public function transform(TenantSettings $settings) {
		return [
			'alertPriorities' => $settings->alertPriorities,
			'stepDeadlines' => $settings->stepDeadlines,
			'blockedStepDeadlines' => TenantSettings::BLOCKED_STEP_DEADLINES,
		];
	}

}