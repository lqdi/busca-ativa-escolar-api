SELECT c.id, cc.current_step_type, csa.alert_status as AlertStatus, c.alert_status as ChildrenAlertStatus, cc.case_status, c.child_status FROM homestead.children c
JOIN homestead.case_steps_alerta csa ON csa.child_id = c.id 
JOIN homestead.children_cases cc ON cc.child_id = c.id 
where c.alert_status = 'rejected' and csa.alert_status = 'pending'