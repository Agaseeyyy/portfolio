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
    <!-- Mobile Menu Toggle -->
    <button id="mobile-menu-toggle" class="fixed z-50 p-3 rounded-lg lg:hidden top-4 left-4 bg-base-200 text-primary">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <!-- Sidebar Overlay (Mobile) -->
    <div id="sidebar-overlay" class="fixed inset-0 z-30 hidden bg-black/50 lg:hidden"></div>

    <!-- Sidebar -->
    <aside id="admin-sidebar" class="admin-sidebar">
        <!-- Brand -->
        <div class="admin-sidebar-brand">
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
        <nav class="admin-sidebar-menu">
            <ul class="space-y-2">
                <!-- Dashboard -->
                <li>
                    <a href="<?= base_url('admin') ?>" class="admin-sidebar-item <?= ($activeMenu ?? '') === 'dashboard' ? 'active' : '' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                        </svg>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="pt-4 pb-2">
                    <span class="px-4 text-xs font-semibold tracking-wider uppercase text-base-content/50">Content</span>
                </li>

                <!-- Home -->
                <li>
                    <a href="<?= base_url('admin/home') ?>" class="admin-sidebar-item <?= ($activeMenu ?? '') === 'home' ? 'active' : '' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span>Home Section</span>
                    </a>
                </li>

                <!-- Projects -->
                <li>
                    <a href="<?= base_url('admin/projects') ?>" class="admin-sidebar-item <?= ($activeMenu ?? '') === 'projects' ? 'active' : '' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        <span>Projects</span>
                    </a>
                </li>

                <!-- Tech Stack -->
                <li>
                    <a href="<?= base_url('admin/techstack') ?>" class="admin-sidebar-item <?= ($activeMenu ?? '') === 'techstack' ? 'active' : '' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                        </svg>
                        <span>Tech Stack</span>
                    </a>
                </li>

                <!-- Certifications -->
                <li>
                    <a href="<?= base_url('admin/certifications') ?>" class="admin-sidebar-item <?= ($activeMenu ?? '') === 'certifications' ? 'active' : '' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                        </svg>
                        <span>Certifications</span>
                    </a>
                </li>

                <!-- Services -->
                <li>
                    <a href="<?= base_url('admin/services') ?>" class="admin-sidebar-item <?= ($activeMenu ?? '') === 'services' ? 'active' : '' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>Services</span>
                    </a>
                </li>

                <!-- Contact Info -->
                <li>
                    <a href="<?= base_url('admin/contacts') ?>" class="admin-sidebar-item <?= ($activeMenu ?? '') === 'contacts' ? 'active' : '' ?>">
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
            <a href="<?= base_url('') ?>" target="_blank" class="admin-sidebar-item">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                </svg>
                <span>View Site</span>
            </a>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="admin-content">
        <!-- Top Header -->
        <header class="admin-header">
            <div>
                <h2 class="text-xl font-bold text-base-content"><?= htmlspecialchars($pageTitle ?? 'Dashboard') ?></h2>
                <p class="text-sm text-base-content/60"><?= htmlspecialchars($pageDescription ?? 'Admin Panel') ?></p>
            </div>
            <div class="flex items-center gap-4">
                <!-- User Info (no dropdown since no login) -->
                <div class="flex items-center gap-3">
                    <div class="hidden text-right sm:block">
                        <p class="text-sm font-medium text-base-content"><?= htmlspecialchars($homeData['name'] ?? 'Admin') ?></p>
                        <p class="text-xs text-base-content/60">Administrator</p>
                    </div>
                    <div class="w-10 h-10 overflow-hidden rounded-full ring-2 ring-primary/50">
                        <?php 
                        $photo = $homeData['profile_photo'] ?? '';
                        $photoUrl = !empty($photo) ? base_url($photo) : base_url('images/def-avatar.png');
                        ?>
                        <img src="<?= $photoUrl ?>" alt="Admin" class="object-cover w-full h-full">
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="admin-main">
            <?= View::renderSection('content') ?>
        </main>
    </div>

    <!-- Mobile Sidebar Script -->
    <script>
        const sidebar = document.getElementById('admin-sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        const toggle = document.getElementById('mobile-menu-toggle');

        toggle?.addEventListener('click', () => {
            sidebar.classList.toggle('open');
            overlay.classList.toggle('hidden');
        });

        overlay?.addEventListener('click', () => {
            sidebar.classList.remove('open');
            overlay.classList.add('hidden');
        });
    </script>

    <?= View::renderSection('scripts') ?>
</body>
</html>
