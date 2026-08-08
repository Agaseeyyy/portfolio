<?php

/**
 * Web Routes
 * 
 * Defines all application routes
 */

use app\controllers\HomeController;
use app\controllers\SitemapController;
use app\controllers\Admin\AuthController;
use app\controllers\Admin\DashboardController;
use app\controllers\Admin\HomeController as AdminHomeController;
use app\controllers\Admin\ContactInfoController;
use app\controllers\Admin\ProjectController;
use app\controllers\Admin\TechstackController;
use app\controllers\Admin\CertificationController;

// Public routes
$router->get('/', [HomeController::class, 'index']);
$router->get('/project/{id}', [HomeController::class, 'projectDetail']);
$router->get('/sitemap.xml', [SitemapController::class, 'index']);
$router->get('/sitemap', [SitemapController::class, 'index']);

// Admin - Authentication
$router->get('/admin/login', [AuthController::class, 'login']);
$router->post('/admin/authenticate', [AuthController::class, 'authenticate']);
$router->get('/admin/logout', [AuthController::class, 'logout']);

// Admin - Dashboard
$router->get('/admin', [DashboardController::class, 'index']);

// Admin - Home Section
$router->get('/admin/home', [AdminHomeController::class, 'index']);
$router->post('/admin/home/store', [AdminHomeController::class, 'store']);

// Admin - Contacts
$router->get('/admin/contacts', [ContactInfoController::class, 'index']);
$router->post('/admin/contacts/store', [ContactInfoController::class, 'store']);

// Admin - Projects
$router->get('/admin/projects', [ProjectController::class, 'index']);
$router->post('/admin/projects/store', [ProjectController::class, 'store']);
$router->post('/admin/projects/delete/{id}', [ProjectController::class, 'delete']);

// Admin - Techstack
$router->get('/admin/techstack', [TechstackController::class, 'index']);
$router->post('/admin/techstack/store', [TechstackController::class, 'store']);
$router->post('/admin/techstack/delete/{id}', [TechstackController::class, 'delete']);

// Admin - Certifications
$router->get('/admin/certifications', [CertificationController::class, 'index']);
$router->post('/admin/certifications/store', [CertificationController::class, 'store']);
$router->post('/admin/certifications/delete/{id}', [CertificationController::class, 'delete']);
