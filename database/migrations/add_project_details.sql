-- Add new columns to projects_tbl for detailed view
-- Run this SQL if you already have the database created

ALTER TABLE `projects_tbl`
ADD COLUMN `long_description` TEXT DEFAULT NULL AFTER `description`,
ADD COLUMN `challenges` TEXT DEFAULT NULL AFTER `long_description`,
ADD COLUMN `key_features` TEXT DEFAULT NULL AFTER `challenges`,
ADD COLUMN `role` VARCHAR(150) DEFAULT NULL AFTER `key_features`;
