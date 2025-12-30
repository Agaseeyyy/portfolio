<?php

/**
 * Application Bootstrap
 * 
 * Initializes the application:
 * - Loads Composer autoloader
 * - Configures environment-based error handling
 * - Runs migrations/seeders in development
 */

// Load Composer autoloader
require_once dirname(__DIR__) . '/vendor/autoload.php';

use app\core\Config;

// Load environment configuration
Config::load();

// Configure error display based on environment
if (Config::isDebug()) {
    // Development: Show all errors
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
} else {
    // Production: Hide errors from users
    error_reporting(0);
    ini_set('display_errors', '0');
    ini_set('log_errors', '1');
}

// Auto-run migrations and seeders only in development
if (!Config::isProduction()) {
    \app\core\Migration::ensureDatabase();

    require_once dirname(__DIR__) . '/database/migrations/CreateTables.php';
    $migration = new \CreateTables();
    $migration->up();

    require_once dirname(__DIR__) . '/database/seeds/DatabaseSeeder.php';
    $seeder = new \DatabaseSeeder();
    $seeder->run();
}
