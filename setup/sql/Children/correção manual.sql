-- child_status     | case_status
-- out_of_school    | in_progress
-- in_observation   | in_progress
-- in_school        | completed
-- cancelled        | cancelled
-- interrupted      | interrupted
-- transferred      | transferred
-- Crianca cancelada e caso em progresso = caso recebe o status cancelado
use base05042020prodmin;
SET @child_status='cancelled' COLLATE utf8_unicode_ci; 
SET @cases_status='in_progress' COLLATE utf8_unicode_ci; 
SET @status_update='cancelled' COLLATE utf8_unicode_ci;

UPDATE children_cases cc
JOIN children c ON cc.child_id = c.id 
SET cc.case_status = @status_update
where c.child_status = @child_status and cc.case_status = @cases_status;

SET @child_status='in_observation' COLLATE utf8_unicode_ci; 
SET @cases_status='cancelled' COLLATE utf8_unicode_ci; 
SET @status_update='cancelled' COLLATE utf8_unicode_ci;

UPDATE children_cases cc
JOIN children c ON cc.child_id = c.id 
SET c.child_status = @status_update
where c.child_status = @child_status and cc.case_status = @cases_status;

SET @child_status='out_of_school' COLLATE utf8_unicode_ci; 
SET @cases_status='cancelled' COLLATE utf8_unicode_ci; 
SET @status_update='cancelled' COLLATE utf8_unicode_ci;

UPDATE children_cases cc
JOIN children c ON cc.child_id = c.id 
SET c.child_status = @status_update
where c.child_status = @child_status and cc.case_status = @cases_status;

SET @child_status='out_of_school' COLLATE utf8_unicode_ci; 
SET @cases_status='interrupted' COLLATE utf8_unicode_ci; 
SET @status_update='interrupted' COLLATE utf8_unicode_ci;

UPDATE children_cases cc
JOIN children c ON cc.child_id = c.id 
SET c.child_status = @status_update
where c.child_status = @child_status and cc.case_status = @cases_status