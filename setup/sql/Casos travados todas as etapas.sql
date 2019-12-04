use `27112019`;
SELECT crianca.current_step_type, count(distinct crianca.id) as quantidade

-- crianca.id, 
-- crianca.name, 
-- alerta.place_city_name, 
-- alerta.assigned_user_id, 
-- alerta.is_pending_assignment as pending_assigment_alerta,
-- pesquisa.is_pending_assignment as pending_assigment_pesquisa,
-- analise.is_pending_assignment as pending_assigment_analise,
-- gestao.is_pending_assignment as pending_assigment_gestao,
-- rematricula.is_pending_assignment as pending_assigment_rematricula,
-- observacao.is_pending_assignment as pending_assigment_observacao,
-- --
-- alerta.assigned_user_id as pending_assigment_id_alerta,
-- pesquisa.assigned_user_id as pending_assigment_id_pesquisa,
-- analise.assigned_user_id as pending_assigment_id_analise,
-- gestao.assigned_user_id as pending_assigment_id_gestao,
-- rematricula.assigned_user_id as pending_assigment_id_rematricula,
-- observacao.assigned_user_id as pending_assigment_id_observacao,
-- --
-- alerta.place_uf,
-- crianca.current_step_type as children_step_type_Crianca,
-- casos.current_step_type as children_step_type_Casos,
-- alerta.is_completed as alerta, 
-- pesquisa.is_completed as pesquisa, 
-- analise.is_completed as analise, 
-- gestao.is_completed as gestao, 
-- rematricula.is_completed as rematricula, 
-- observacao.is_completed as observacao, 
-- alerta.alert_status, 
-- crianca.alert_status childStatusAlert, 
-- crianca.child_status, 
-- casos.case_status
FROM case_steps_alerta alerta
JOIN children crianca ON alerta.child_id = crianca.id
JOIN children_cases casos ON casos.child_id = crianca.id
JOIN case_steps_pesquisa pesquisa ON pesquisa.child_id = crianca.id
JOIN case_steps_analise_tecnica analise ON analise.child_id = crianca.id
JOIN case_steps_gestao_do_caso gestao ON gestao.child_id = crianca.id
JOIN case_steps_rematricula rematricula ON rematricula.child_id = crianca.id
JOIN case_steps_observacao observacao ON observacao.child_id = crianca.id
WHERE 
alerta.alert_status = 'accepted'
and crianca.alert_status = 'accepted' and 
(crianca.current_step_type = 'BuscaAtivaEscolar\\CaseSteps\\Pesquisa'
and alerta.is_completed = 1
and pesquisa.is_completed = 1
and analise.is_completed = 0
and gestao.is_completed = 0
and observacao.is_completed = 0) 
or 
(crianca.current_step_type = 'BuscaAtivaEscolar\\CaseSteps\\AnaliseTecnica'
and alerta.is_completed = 1
and pesquisa.is_completed = 1
and analise.is_completed = 1
and gestao.is_completed = 0
and observacao.is_completed = 0
)
or
(crianca.current_step_type = 'BuscaAtivaEscolar\\CaseSteps\\GestaoDoCaso'
and alerta.is_completed = 1
and pesquisa.is_completed = 1
and analise.is_completed = 1
and gestao.is_completed = 1
and observacao.is_completed = 0
)
or
(crianca.current_step_type = 'BuscaAtivaEscolar\\CaseSteps\\Rematricula'
and alerta.is_completed = 1
and pesquisa.is_completed = 1
and analise.is_completed = 1
and gestao.is_completed = 1
and rematricula.is_completed = 1
and observacao.is_completed = 0
)
group by crianca.current_step_type


