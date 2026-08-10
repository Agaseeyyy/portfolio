<?php

/**
 * Application Bootstrap
 *
 * Initializes the application:
 * - Loads Composer autoloader
 * - Configures environment-based error handling
 * - Registers global error/exception handlers
 * - Runs migrations/seeders only when the database is missing tables
 */

// Load Composer autoloader
require_once dirname(__DIR__) . '/vendor/autoload.php';

use app\core\Config;
use app\core\Database;
use app\core\Migration;

// Load environment configuration
Config::load();

// Configure error display based on environment
if (Config::isDebug()) {
    // Development: Show all errors
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
} else {
    // Production: Hide errors from users, log them instead
    error_reporting(E_ALL);
    ini_set('display_errors', '0');
    ini_set('log_errors', '1');
}

/**
 * Global exception handler.
 * Logs the error and renders a clean 500 page (or the raw trace in debug).
 */
set_exception_handler(function (\Throwable $e): void {
    error_log(sprintf(
        '[FATAL] %s in %s:%d',
        $e->getMessage(),
        $e->getFile(),
        $e->getLine()
    ));

    if (PHP_SAPI === 'cli') {
        fwrite(STDERR, 'Fatal error: ' . $e->getMessage() . "\n");
        exit(1);
    }

    http_response_code(500);
    while (ob_get_level() > 0) {
        ob_end_clean();
    }

    if (Config::isDebug()) {
        echo '<pre>' . htmlspecialchars((string) $e) . '</pre>';
        return;
    }

    $viewPath = dirname(__DIR__) . '/resources/views/errors/500.php';
    if (file_exists($viewPath)) {
        require $viewPath;
    } else {
        echo 'Something went wrong. Please try again later.';
    }
    exit;
});

/**
 * Error handler. Converts recoverable PHP errors into exceptions so they
 * follow the same logging/rendering path as thrown exceptions.
 */
set_error_handler(function (int $severity, string $message, string $file, int $line): bool {
    if (!(error_reporting() & $severity)) {
        return false;
    }
    throw new \ErrorException($message, 0, $severity, $file, $line);
});

// Auto-setup the database in development only when tables are missing.
// In production this never runs; run `php database/migrations/migrate.php` manually.
if (!Config::isProduction()) {
    $needsSetup = false;

    try {
        $pdo = Database::getInstance();
        $needsSetup = !(bool) $pdo->query("SHOW TABLES LIKE 'home_tbl'")->fetchColumn();
    } catch (\Throwable $e) {
        $needsSetup = true;
    }

    if ($needsSetup) {
        Migration::ensureDatabase();

        require_once dirname(__DIR__) . '/database/migrations/CreateTables.php';
        (new \CreateTables())->up();

        require_once dirname(__DIR__) . '/database/seeds/DatabaseSeeder.php';
        (new \DatabaseSeeder())->run();
    }
}
