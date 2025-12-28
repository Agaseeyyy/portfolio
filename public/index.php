<?php
/**
 * Main Entry Point
 * 
 * Clean router dispatcher. Layout rendering is handled by:
 * - Public routes: resources/views/public/layout.php
 * - Admin routes: resources/views/admin/layout.php
 */

// Show ALL errors for development
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('html_errors', 1);
error_reporting(E_ALL);
// Start session for flash messages
session_start();

require_once (__DIR__ . '/../app/core/autoload.php');
require_once (__DIR__ . '/../app/core/helpers.php');

use app\core\Router;

$router = new Router();
require_once (__DIR__ . '/../routes/web.php');


    // Admin routes - views handle their own complete HTML layout
    $router->dispatch();
   
