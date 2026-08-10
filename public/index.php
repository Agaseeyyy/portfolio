<?php

/**
 * Main Entry Point
 * 
 * Clean router dispatcher. Layout rendering is handled by:
 * - Public routes: resources/views/public/layout.php
 * - Admin routes: resources/views/admin/layout.php
 * 
 * Error display is controlled by APP_DEBUG in .env
 */

// Harden session cookies before starting the session
$sessionSecure = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off');
session_set_cookie_params([
    'httponly' => true,
    'samesite' => 'Lax',
    'secure' => $sessionSecure,
]);

// Start session for flash messages
session_start();

// Bootstrap the application (Composer autoloader + config + error handlers)
require_once __DIR__ . '/../app/bootstrap.php';

use app\core\Router;

// Initialize router and load routes
$router = new Router();
require_once __DIR__ . '/../routes/web.php';

// Dispatch the request
$router->dispatch();
