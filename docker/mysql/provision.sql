CREATE DATABASE IF NOT EXISTS smart_energy;
CREATE USER IF NOT EXISTS `power`@`%`;
SET PASSWORD FOR `power`@`%` = 'poweruser';
GRANT ALL PRIVILEGES ON smart_energy.* TO `power`@`%`;