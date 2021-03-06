SET SQL_SAFE_UPDATES = 0;
DELETE FROM notifications WHERE created_at < DATE_SUB(NOW(), INTERVAL 6 MONTH);
DELETE FROM activity_log WHERE created_at < DATE_SUB(NOW(), INTERVAL 6 MONTH);
OPTIMIZE TABLE activity_log;
OPTIMIZE TABLE notifications;
SET SQL_SAFE_UPDATES = 1;
