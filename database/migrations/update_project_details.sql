-- Update projects_tbl for detailed project view
-- If a column already exists (Error #1060), skip that specific line or run remaining lines below.

-- 1. Try adding long_description
ALTER TABLE `projects_tbl` ADD COLUMN `long_description` TEXT DEFAULT NULL AFTER `description`;

-- 2. Try adding challenges
ALTER TABLE `projects_tbl` ADD COLUMN `challenges` TEXT DEFAULT NULL AFTER `long_description`;

-- 3. Try adding key_features
ALTER TABLE `projects_tbl` ADD COLUMN `key_features` TEXT DEFAULT NULL AFTER `challenges`;

-- 4. Try adding role
ALTER TABLE `projects_tbl` ADD COLUMN `role` VARCHAR(150) DEFAULT NULL AFTER `key_features`;
