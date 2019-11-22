use antes;
SELECT 
crianca.current_step_type,
-- crianca.current_step_id, 
alerta.is_completed as alerta, 
pesquisa.is_completed as pesquisa, 
analise.is_completed as analise, 
gestao.is_completed as gestao, 
rematricula.is_completed as rematricula, 
observacao.is_completed as observacao, 
alerta.alert_status, crianca.alert_status childStatusAlert, 
crianca.child_status, 
casos.case_status 
FROM case_steps_alerta alerta
JOIN children crianca ON alerta.child_id = crianca.id
JOIN children_cases casos ON casos.child_id = crianca.id
JOIN case_steps_pesquisa pesquisa ON pesquisa.child_id = crianca.id
JOIN case_steps_analise_tecnica analise ON analise.child_id = crianca.id
JOIN case_steps_gestao_do_caso gestao ON gestao.child_id = crianca.id
JOIN case_steps_rematricula rematricula ON rematricula.child_id = crianca.id
JOIN case_steps_observacao observacao ON observacao.child_id = crianca.id
where 
alerta.alert_status = 'accepted'
and
crianca.alert_status = 'accepted'
and
crianca.current_step_type = 'BuscaAtivaEscolar\\CaseSteps\\Pesquisa'
and
pesquisa.is_completed = 1