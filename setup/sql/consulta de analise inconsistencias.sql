use `11112019`;
SELECT *
FROM children c
JOIN case_steps_alerta csa ON csa.child_id = c.id 
JOIN children_cases cc ON cc.child_id = c.id 
where csa.alert_status = 'pending' and c.alert_status = 'accepted'