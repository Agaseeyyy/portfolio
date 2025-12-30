<?php

/**
 * Admin Layout
 * 
 * Complete admin layout with sidebar, header, and footer.
 * Child views use View::extend() and View::section() to inject content.
 * 
 * Expected variables:
 * @var string $pageTitle
 * @var string $pageDescription  
 * @var string $activeMenu
 */

use app\core\View;
use app\core\Config;
use app\models\HomeModel;

// Fetch fresh homeData for sidebar/header (name, photo)
$homeModel = new HomeModel();
$homeData = $homeModel->first() ?? [];
?>
<!DOCTYPE html>
<html lang="en" data-theme="admin">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#111827">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="<?= base_url('resources/css/admin-compiled.css') ?>" rel="stylesheet">
    <title><?= View::renderSection('title') ?: ($pageTitle ?? 'Dashboard') ?> | Admin Panel</title>
    <link rel="icon" type="image/png" href="<?= base_url('images/favicon.png') ?>">

</head>

<body class="bg-base-100">
    <!-- DaisyUI Drawer - responsive sidebar -->
    <div class="drawer drawer-mobile lg:drawer-open">
        <!-- Drawer toggle (hidden checkbox) -->
        <input id="admin-drawer" type="checkbox" class="drawer-toggle" />

        <!-- Main Content Area (drawer-content) -->
        <div class="drawer-content flex flex-col min-h-screen">
            <!-- Top Navbar -->
            <header class="navbar sticky top-0 z-30 px-6 py-4 border-b bg-base-200/80 backdrop-blur-md border-primary/20">
                <!-- Mobile menu toggle button -->
                <label for="admin-drawer" class="btn btn-square btn-ghost lg:hidden mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </label>
                <div class="flex-1">
                    <h2 class="text-xl font-bold text-base-content"><?= htmlspecialchars($pageTitle ?? 'Dashboard') ?></h2>
                    <p class="text-sm text-base-content/60"><?= htmlspecialchars($pageDescription ?? 'Admin Panel') ?></p>
                </div>
                <div class="flex items-center gap-4">
                    <!-- Profile Dropdown -->
                    <div class="dropdown dropdown-end">
                        <div tabindex="0" role="button" class="flex items-center gap-3 cursor-pointer hover:opacity-80 transition-opacity">
                            <div class="hidden text-right sm:block">
                                <p class="text-sm font-medium text-base-content"><?= htmlspecialchars($homeData['name'] ?? 'Admin') ?></p>
                                <p class="text-xs text-base-content/60">Administrator</p>
                            </div>
                            <div class="w-10 h-10 overflow-hidden rounded-full ring-2 ring-primary/50">
                                <?php
                                $photo = $homeData['profile_photo'] ?? '';
                                $photoUrl = !empty($photo) ? base_url($photo) : base_url(Config::get('DEFAULT_AVATAR', 'images/def-avatar.png'));
                                ?>
                                <img src="<?= $photoUrl ?>" alt="Admin" class="object-cover w-full h-full">
                            </div>
                        </div>
                        <ul tabindex="-1" class="dropdown-content menu bg-base-200 rounded-box z-50 w-52 p-2 shadow-lg border border-primary/20 mt-2">
                            <li class="menu-title px-4 py-2">
                                <span class="text-xs text-base-content/50">Signed in as</span>
                                <span class="text-sm font-medium text-base-content"><?= htmlspecialchars($homeData['name'] ?? 'Admin') ?></span>
                            </li>
                            <div class="divider my-1"></div>
                            <li>
                                <a href="<?= base_url('admin/home') ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Edit Profile
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('admin/logout') ?>" class="text-error">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-6">
                <?= View::renderSection('content') ?>
            </main>
        </div>

        <!-- Sidebar (drawer-side) -->
        <div class="drawer-side z-40">
            <!-- Overlay for mobile -->
            <label for="admin-drawer" aria-label="close sidebar" class="drawer-overlay"></label>

            <!-- Sidebar content -->
            <aside class="flex flex-col w-64 min-h-full border-r bg-base-200 border-primary/20">
                <!-- Brand -->
                <div class="p-6 border-b border-primary/20">
                    <a href="<?= base_url('admin') ?>" class="flex items-center gap-3">
                        <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-gradient-to-br from-pink-500 to-rose-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-lg font-bold text-base-content">Portfolio</h1>
                            <p class="text-xs text-primary">Admin Panel</p>
                        </div>
                    </a>
                </div>

                <!-- Navigation Menu -->
                <nav class="flex-1 p-4 overflow-y-auto">
                    <ul class="menu space-y-2 w-full">
                        <!-- Dashboard -->
                        <li>
                            <a href="<?= base_url('admin') ?>" class="<?= ($activeMenu ?? '') === 'dashboard' ? 'active' : '' ?> ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                                </svg>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="menu-title pt-4">
                            <span>Content</span>
                        </li>

                        <!-- Home -->
                        <li>
                            <a href="<?= base_url('admin/home') ?>" class="<?= ($activeMenu ?? '') === 'home' ? 'active' : '' ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                <span>Home Section</span>
                            </a>
                        </li>

                        <!-- Projects -->
                        <li>
                            <a href="<?= base_url('admin/projects') ?>" class="<?= ($activeMenu ?? '') === 'projects' ? 'active' : '' ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                                <span>Projects</span>
                            </a>
                        </li>

                        <!-- Tech Stack -->
                        <li>
                            <a href="<?= base_url('admin/techstack') ?>" class="<?= ($activeMenu ?? '') === 'techstack' ? 'active' : '' ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                </svg>
                                <span>Tech Stack</span>
                            </a>
                        </li>

                        <!-- Certifications -->
                        <li>
                            <a href="<?= base_url('admin/certifications') ?>" class="<?= ($activeMenu ?? '') === 'certifications' ? 'active' : '' ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                </svg>
                                <span>Certifications</span>
                            </a>
                        </li>

                        <!-- Services -->
                        <li>
                            <a href="<?= base_url('admin/services') ?>" class="<?= ($activeMenu ?? '') === 'services' ? 'active' : '' ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span>Services</span>
                            </a>
                        </li>

                        <!-- Contact Info -->
                        <li>
                            <a href="<?= base_url('admin/contacts') ?>" class="<?= ($activeMenu ?? '') === 'contacts' ? 'active' : '' ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span>Contact Info</span>
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- Sidebar Footer -->
                <div class="p-4 border-t border-primary/20">
                    <a href="<?= base_url('') ?>" target="_blank" class="flex items-center gap-3 px-4 py-3 rounded-lg text-base-content/70 hover:bg-primary/10 hover:text-primary transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                        <span>View Site</span>
                    </a>
                </div>
            </aside>
        </div>
    </div>

    <?= View::renderSection('scripts') ?>
</body>

</html>