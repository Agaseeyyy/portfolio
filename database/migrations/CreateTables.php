<?php
/**
 * Create Tables Migration
 * 
 * Creates all portfolio database tables.
 * Core classes are loaded via autoload.php.
 */

use app\core\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migration
     */
    public function up(): void
    {
        // Home Table - Personal/Hero section info
        $this->createTable('home_tbl', "
            `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
            `name` VARCHAR(100) NOT NULL,
            `role` VARCHAR(100) NOT NULL,
            `short_bio` TEXT NOT NULL,
            `profile_photo` VARCHAR(255) DEFAULT NULL,
            `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
            `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
        ");

        // Contact Info Table
        $this->createTable('contact_info_tbl', "
            `contact_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
            `email` VARCHAR(100) NOT NULL,
            `address` VARCHAR(150) NOT NULL,
            `github_link` VARCHAR(255) DEFAULT NULL,
            `linkedin_link` VARCHAR(255) DEFAULT NULL,
            `instagram_link` VARCHAR(255) DEFAULT NULL,
            PRIMARY KEY (`contact_id`)
        ");

        // Projects Table
        $this->createTable('projects_tbl', "
            `project_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
            `project_name` VARCHAR(150) NOT NULL,
            `description` TEXT DEFAULT NULL,
            `long_description` TEXT DEFAULT NULL,
            `challenges` TEXT DEFAULT NULL,
            `key_features` TEXT DEFAULT NULL,
            `role` VARCHAR(150) DEFAULT NULL,
            `image` VARCHAR(255) DEFAULT NULL,
            `preview_link` VARCHAR(255) DEFAULT NULL,
            `project_link` VARCHAR(255) DEFAULT NULL,
            `start_date` DATE NOT NULL,
            `end_date` DATE DEFAULT NULL,
            `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
            `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (`project_id`)
        ");

        // Techstack Table
        $this->createTable('techstack_tbl', "
            `tech_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
            `tech_name` VARCHAR(100) NOT NULL,
            `icon` VARCHAR(255) DEFAULT NULL,
            `category` ENUM('frontend', 'backend', 'database', 'tools') NOT NULL DEFAULT 'tools',
            `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
            `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (`tech_id`)
        ");

        // Services Table
        $this->createTable('services_tbl', "
            `service_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
            `icon` VARCHAR(255) DEFAULT NULL,
            `title` VARCHAR(150) NOT NULL,
            `description_json` TEXT DEFAULT NULL,
            `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
            `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (`service_id`)
        ");

        // Certifications Table
        $this->createTable('certifications_tbl', "
            `certification_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
            `image` VARCHAR(255) DEFAULT NULL,
            `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
            `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (`certification_id`)
        ");

        // Project Technologies (Pivot Table)
        $this->createTable('project_technologies_tbl', "
            `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
            `project_id` INT(11) UNSIGNED NOT NULL,
            `tech_id` INT(11) UNSIGNED NOT NULL,
            `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`),
            UNIQUE KEY `unique_project_tech` (`project_id`, `tech_id`),
            KEY `fk_project_tech_project` (`project_id`),
            KEY `fk_project_tech_tech` (`tech_id`),
            CONSTRAINT `fk_project_tech_project` FOREIGN KEY (`project_id`) REFERENCES `projects_tbl` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE,
            CONSTRAINT `fk_project_tech_tech` FOREIGN KEY (`tech_id`) REFERENCES `techstack_tbl` (`tech_id`) ON DELETE CASCADE ON UPDATE CASCADE
        ");
    }

    /**
     * Rollback the migration
     */
    public function down(): void
    {
        $this->dropTable('project_technologies_tbl');
        $this->dropTable('certifications_tbl');
        $this->dropTable('services_tbl');
        $this->dropTable('techstack_tbl');
        $this->dropTable('projects_tbl');
        $this->dropTable('contact_info_tbl');
        $this->dropTable('home_tbl');
    }
}
