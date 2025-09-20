<?php

$router->get('/', [HomeController::class, 'index']);
$router->get('/admin', [AdminController::class, 'index']);
