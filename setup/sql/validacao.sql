SELECT *, csa.alert_status, c.alert_status childStatusAlert, cc.case_status, c.child_status FROM homestead.children c
JOIN homestead.case_steps_alerta csa ON csa.child_id = c.id 
JOIN homestead.children_cases cc ON cc.child_id = c.id 
where c.alert_status = 'accepted' and csa.alert_status = 'accepted'