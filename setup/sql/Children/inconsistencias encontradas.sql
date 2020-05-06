-- child_status     | case_status
-- out_of_school    | in_progress
-- in_observation   | in_progress
-- in_school        | completed
-- cancelled        | cancelled
-- interrupted      | interrupted
-- transferred      | transferred

use base05042020prod;
SET @child_status='cancelled' COLLATE utf8_unicode_ci; 
SET @cases_status='cancelled' COLLATE utf8_unicode_ci; 

SELECT c.id, c.alert_status as crianca, csa.alert_status as alerta
FROM children c
JOIN case_steps_alerta csa ON csa.child_id = c.id 
JOIN children_cases cc ON cc.child_id = c.id 
where c.alert_status = 'accepted'
c.child_status = @child_status and cc.case_status = @cases_status