<?php
return [

	BuscaAtivaEscolar\User::TYPE_SUPERUSER => [
		'reports.view',
		'users.view',
		'users.manage',
		'cases.view',
		'alerts.spawn',
		'tenants.manage',
		'developer_tools',
	],

	BuscaAtivaEscolar\User::TYPE_GESTOR_NACIONAL => [
		'reports.view',
		'users.view',
		'users.manage',
		'alerts.spawn',
		'tenants.manage',
	],

	BuscaAtivaEscolar\User::TYPE_GESTOR_POLITICO => [
		'reports.view',
		'users.view',
		'users.manage',
		'alerts.spawn',
		'settings.manage',
		'preferences',
	],

	BuscaAtivaEscolar\User::TYPE_GESTOR_OPERACIONAL => [
		'reports.view',
		'users.view',
		'users.manage',
		'cases.view',
		'cases.manage',
		'cases.cancel',
		'cases.assign',
		'cases.reopen',
		'cases.step.alerta',
		'cases.step.pesquisa',
		'cases.step.analise_tecnica',
		'cases.step.gestao_do_caso',
		'cases.step.rematricula',
		'cases.step.1a_observacao',
		'cases.step.2a_observacao',
		'cases.step.3a_observacao',
		'cases.step.4a_observacao',
		'alerts.pending',
		'alerts.spawn',
		'settings.manage',
		'preferences',
	],

	BuscaAtivaEscolar\User::TYPE_SUPERVISOR_INSTITUCIONAL => [
		'reports.view',
		'cases.view',
		'cases.manage',
		'cases.cancel',
		'cases.assign',
		'cases.reopen',
		'cases.step.alerta',
		'cases.step.pesquisa',
		'cases.step.analise_tecnica',
		'cases.step.gestao_do_caso',
		'cases.step.rematricula',
		'cases.step.1a_observacao',
		'cases.step.2a_observacao',
		'cases.step.3a_observacao',
		'cases.step.4a_observacao',
		'alerts.pending',
		'alerts.spawn',
		'preferences',
	],

	BuscaAtivaEscolar\User::TYPE_TECNICO_VERIFICADOR => [
		'reports.view',
		'cases.view',
		'cases.manage',
		'cases.step.alerta',
		'cases.step.pesquisa',
		'cases.step.analise_tecnica',
		'alerts.spawn',
		'preferences',
	],

	BuscaAtivaEscolar\User::TYPE_AGENTE_COMUNITARIO => [
		'alerts.spawn',
	],

];