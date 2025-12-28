<?php
/**
 * Main Entry Point
 * 
 * Clean router dispatcher. Layout rendering is handled by:
 * - Public routes: resources/views/public/layout.php
 * - Admin routes: resources/views/admin/layout.php
 * 
 * Error display is controlled by APP_DEBUG in .env (handled by autoload.php)
 */

// Start session for flash messages
session_start();

require_once (__DIR__ . '/../app/core/autoload.php');
require_once (__DIR__ . '/../app/core/helpers.php');

use app\core\Router;

$router = new Router();
require_once (__DIR__ . '/../routes/web.php');


    // Admin routes - views handle their own complete HTML layout
    $router->dispatch();
   
