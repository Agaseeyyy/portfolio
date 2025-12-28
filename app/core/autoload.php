<?php
/**
 * Autoloader for the Application
 * 
 * Loads all core classes, models, controllers, and helpers.
 * Also runs database migration/seeding on first load (development only).
 */

// Config must be loaded first (before Database which depends on it)
require_once __DIR__ . '/Config.php';

// Configure error display based on environment
if (\app\core\Config::isDebug()) {
    // Development: Show all errors
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
} else {
    // Production: Hide errors from users
    error_reporting(0);
    ini_set('display_errors', '0');
    ini_set('log_errors', '1');
}

// Helpers (uses Config, so load after Config)
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/../helpers/upload_helper.php';

// Core classes (load Database first, then Migration/Seeder, then others)
require_once __DIR__ . '/Database.php';
require_once __DIR__ . '/Migration.php';
require_once __DIR__ . '/Seeder.php';
require_once __DIR__ . '/Model.php';
require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/Router.php';
require_once __DIR__ . '/View.php';

// Models
require_once __DIR__ . '/../models/HomeModel.php';
require_once __DIR__ . '/../models/ContactInfoModel.php';
require_once __DIR__ . '/../models/ProjectModel.php';
require_once __DIR__ . '/../models/TechstackModel.php';
require_once __DIR__ . '/../models/ServiceModel.php';
require_once __DIR__ . '/../models/CertificationModel.php';
require_once __DIR__ . '/../models/ProjectTechModel.php';

// Public Controllers
require_once __DIR__ . '/../controllers/HomeController.php';

// Admin Controllers
require_once __DIR__ . '/../controllers/Admin/DashboardController.php';
require_once __DIR__ . '/../controllers/Admin/HomeController.php';
require_once __DIR__ . '/../controllers/Admin/ContactInfoController.php';
require_once __DIR__ . '/../controllers/Admin/ProjectController.php';
require_once __DIR__ . '/../controllers/Admin/TechstackController.php';
require_once __DIR__ . '/../controllers/Admin/ServiceController.php';
require_once __DIR__ . '/../controllers/Admin/CertificationController.php';

// Auto-run migrations and seeders only in development
// In production, run these manually via CLI
if (\app\core\Config::env() !== 'production') {
    \app\core\Migration::ensureDatabase();

    require_once dirname(__DIR__, 2) . '/database/migrations/CreateTables.php';
    $migration = new \CreateTables();
    $migration->up();

    require_once dirname(__DIR__, 2) . '/database/seeds/DatabaseSeeder.php';
    $seeder = new \DatabaseSeeder();
    $seeder->run();
}
