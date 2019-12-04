# correção alertas pendentes e crianças aceitas
# O correto no caso de criança accepted é o alert_status da tabela
# case_steps_alerta e children tenham o valor accepted
SET SQL_SAFE_UPDATES = 0;
USE antes06112019;
UPDATE case_steps_alerta csa
JOIN children c ON csa.child_id = c.id 
SET csa.alert_status = 'accepted', csa.is_completed = 1
where c.alert_status = 'accepted' and csa.alert_status = 'pending'