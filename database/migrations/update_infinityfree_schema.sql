-- Incremental Migration Script for Existing InfinityFree Database
-- Safe for execution on live InfinityFree phpMyAdmin (Uses IF NOT EXISTS / DROP IF EXISTS)

-- 1. Remove unused Services table
DROP TABLE IF EXISTS `services_tbl`;

-- 2. Safely add missing detail columns to projects_tbl
ALTER TABLE `projects_tbl`
  ADD COLUMN IF NOT EXISTS `long_description` TEXT DEFAULT NULL AFTER `description`,
  ADD COLUMN IF NOT EXISTS `challenges` TEXT DEFAULT NULL AFTER `long_description`,
  ADD COLUMN IF NOT EXISTS `key_features` TEXT DEFAULT NULL AFTER `challenges`,
  ADD COLUMN IF NOT EXISTS `role` VARCHAR(150) DEFAULT NULL AFTER `key_features`;

-- 3. Ensure Certifications table exists
CREATE TABLE IF NOT EXISTS `certifications_tbl` (
  `certification_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` VARCHAR(255) DEFAULT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`certification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 4. Ensure Project Technologies pivot table exists
CREATE TABLE IF NOT EXISTS `project_technologies_tbl` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_id` INT(11) UNSIGNED NOT NULL,
  `tech_id` INT(11) UNSIGNED NOT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_project_tech` (`project_id`, `tech_id`),
  KEY `fk_project_tech_project` (`project_id`),
  KEY `fk_project_tech_tech` (`tech_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
