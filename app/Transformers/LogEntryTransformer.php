<?php
/**
 * busca-ativa-escolar-api
 * LogEntryTransformer.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 19/01/2017, 14:30
 */

namespace BuscaAtivaEscolar\Transformers;


use BuscaAtivaEscolar\ActivityLog;
use League\Fractal\TransformerAbstract;

class LogEntryTransformer extends TransformerAbstract {

	protected $availableIncludes = [
		'user',
		'content',
		'tenant'
	];

	protected $defaultIncludes = [
		'user'
	];

	public function transform(ActivityLog $entry) {
		return [
			'tenant_id' => $entry->tenant_id,
			'user_id' => $entry->user_id,
			'content_type' => $entry->content_type,
			'content_id' => $entry->content_id,
			'action' => $entry->action,
			'parameters' => $entry->parameters,
			'user' => $entry->metadata->user ?? null,
			'message_template' => trans('activity_log.child.' . $entry->action),
			'message' => trans('activity_log.child.' . $entry->action, (array) $entry->parameters),
			'created_at' => $entry->created_at ? $entry->created_at->toIso8601String() : null,
		];
	}

	public function includeUser(ActivityLog $entry) {
		return $this->item($entry->user, new UserTransformer(), false);
	}

	public function includeContent(ActivityLog $entry) {
		switch($entry->content_type) {
			case "BuscaAtivaEscolar\\Child": return $this->item($entry->content, new ChildTransformer(), false);
			case "BuscaAtivaEscolar\\ActivityLog": return $this->item($entry->content, new LogEntryTransformer(), false);
			case "BuscaAtivaEscolar\\User": return $this->item($entry->content, new UserTransformer(), false);
			default: return null;
		}
	}

	public function includeTenant(ActivityLog $entry) {
		return $this->item($entry->tenant, new TenantTransformer(), false);
	}

}