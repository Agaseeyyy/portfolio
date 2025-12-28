<?php
/**
 * Database Migration Script
 * 
 * Run this script to set up the database and tables.
 * This will:
 * 1. Create the database if it doesn't exist
 * 2. Create all required tables
 * 
 * Usage: php database/migrations/migrate.php
 * Or visit this file in browser when running on a web server
 */

// Load autoloader (gets core classes)
require_once dirname(__DIR__, 2) . '/app/core/autoload.php';

use app\core\Migration;

echo "Starting migration...\n";

// Ensure database exists first
Migration::ensureDatabase();
echo "✓ Database ensured\n";

// Run migrations
require_once __DIR__ . '/CreateTables.php';
$migration = new CreateTables();
$migration->up();
echo "✓ Tables created\n";

echo "Migration completed successfully!\n";
