<?php
/**
 * Autoloader for the Application
 * 
 * Loads all core classes, models, controllers, and helpers.
 * Also runs database migration/seeding on first load.
 */

// Helpers (load first)
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

// Auto-run migrations (ensure database exists first)
use app\core\Migration;
Migration::ensureDatabase();

require_once dirname(__DIR__, 2) . '/database/migrations/CreateTables.php';
$migration = new CreateTables();
$migration->up();

// Auto-run seeders
require_once dirname(__DIR__, 2) . '/database/seeds/DatabaseSeeder.php';
$seeder = new DatabaseSeeder();
$seeder->run();

