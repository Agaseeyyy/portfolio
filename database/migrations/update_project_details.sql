-- Update projects_tbl for detailed project view
-- Run this SQL on phpMyAdmin if your database is already created

ALTER TABLE `projects_tbl`
  ADD COLUMN `long_description` TEXT DEFAULT NULL AFTER `description`,
  ADD COLUMN `challenges` TEXT DEFAULT NULL AFTER `long_description`,
  ADD COLUMN `key_features` TEXT DEFAULT NULL AFTER `challenges`,
  ADD COLUMN `role` VARCHAR(150) DEFAULT NULL AFTER `key_features`;
