<?php

/**
 * Admin Dashboard
 * 
 * @var string $pageTitle
 * @var string $pageDescription
 * @var string $activeMenu
 * @var array $homeData
 * @var array $contactData
 * @var int $projectCount
 * @var int $techCount
 * @var int $serviceCount
 * @var int $certCount
 */

use app\core\View;

// Extend the admin layout
View::extend('admin/layout');

// Helper function
?>

<?php View::section('title') ?>
<?= $pageTitle ?? 'Dashboard' ?>
<?php View::endSection() ?>

<?php View::section('content') ?>
<?php if (has_flash('success')): ?>
    <div role="alert" class="alert alert-success alert-soft mb-2">
        <span><?= get_flash('success') ?></span>
    </div>
<?php endif; ?>
<!-- Stats Grid -->
<div class="grid grid-cols-1 gap-6 mb-8 sm:grid-cols-2 lg:grid-cols-4">
    <!-- Projects Stats -->
    <div class="stat">
        <div class="flex items-center justify-between">
            <div>
                <p class="stat-title">Total Projects</p>
                <p class="stat-value"><?= $projectCount ?? 0 ?></p>
            </div>
            <div class="stat-figure bg-pink-500/20">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
            </div>
        </div>
        <div class="mt-4">
            <a href="<?= base_url('admin/projects') ?>" class="text-xs text-pink-400 hover:text-pink-300">Manage Projects →</a>
        </div>
    </div>

    <!-- Tech Stack Stats -->
    <div class="stat">
        <div class="flex items-center justify-between">
            <div>
                <p class="stat-title">Tech Stack</p>
                <p class="stat-value"><?= $techCount ?? 0 ?></p>
            </div>
            <div class="stat-figure !bg-blue-500/20">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                </svg>
            </div>
        </div>
        <div class="mt-4">
            <a href="<?= base_url('admin/techstack') ?>" class="text-xs text-blue-400 hover:text-blue-300">Manage Tech →</a>
        </div>
    </div>

    <!-- Certifications Stats -->
    <div class="stat">
        <div class="flex items-center justify-between">
            <div>
                <p class="stat-title">Certifications</p>
                <p class="stat-value"><?= $certCount ?? 0 ?></p>
            </div>
            <div class="stat-figure !bg-green-500/20">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                </svg>
            </div>
        </div>
        <div class="mt-4">
            <a href="<?= base_url('admin/certifications') ?>" class="text-xs text-green-400 hover:text-green-300">Manage Certs →</a>
        </div>
    </div>

    <!-- Services Stats -->
    <div class="stat">
        <div class="flex items-center justify-between">
            <div>
                <p class="stat-title">Services</p>
                <p class="stat-value"><?= $serviceCount ?? 0 ?></p>
            </div>
            <div class="stat-figure !bg-purple-500/20">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
        </div>
        <div class="mt-4">
            <a href="<?= base_url('admin/services') ?>" class="text-xs text-purple-400 hover:text-purple-300">Manage Services →</a>
        </div>
    </div>
</div>

<!-- Quick Actions & Recent Activity -->
<div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
    <!-- Quick Actions -->
    <div class="card">
        <div class="card-body">
            <div class="card-actions justify-between">
                <h3 class="card-title">Quick Actions</h3>
            </div>
            <div class="divider"></div>
            <div class="grid grid-cols-2 gap-4">
                <a href="<?= base_url('admin/home') ?>" class="flex flex-col items-center gap-3 p-4 transition-all duration-200 rounded-lg bg-base-300 hover:bg-pink-500/10 group">
                    <div class="flex items-center justify-center w-12 h-12 rounded-lg bg-pink-500/20 group-hover:bg-pink-500/30">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <span class="text-sm text-gray-300 group-hover:text-pink-400">Edit Home</span>
                </a>

                <a href="<?= base_url('admin/projects') ?>" class="flex flex-col items-center gap-3 p-4 transition-all duration-200 rounded-lg bg-base-300 hover:bg-pink-500/10 group">
                    <div class="flex items-center justify-center w-12 h-12 rounded-lg bg-blue-500/20 group-hover:bg-blue-500/30">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </div>
                    <span class="text-sm text-gray-300 group-hover:text-blue-400">Add Project</span>
                </a>

                <a href="<?= base_url('admin/services') ?>" class="flex flex-col items-center gap-3 p-4 transition-all duration-200 rounded-lg bg-base-300 hover:bg-pink-500/10 group">
                    <div class="flex items-center justify-center w-12 h-12 rounded-lg bg-purple-500/20 group-hover:bg-purple-500/30">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </div>
                    <span class="text-sm text-gray-300 group-hover:text-purple-400">Add Service</span>
                </a>

                <a href="<?= base_url('admin/contacts') ?>" class="flex flex-col items-center gap-3 p-4 transition-all duration-200 rounded-lg bg-base-300 hover:bg-pink-500/10 group">
                    <div class="flex items-center justify-center w-12 h-12 rounded-lg bg-green-500/20 group-hover:bg-green-500/30">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <span class="text-sm text-gray-300 group-hover:text-green-400">Edit Contact</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Content Overview -->
    <div class="card">
        <div class="card-body">
            <div class="card-actions justify-between">
                <h3 class="card-title">Content Sections</h3>
            </div>
            <div class="divider"></div>
            <div class="space-y-4">
                <div class="flex items-center justify-between p-3 rounded-lg bg-base-300">
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 rounded-full bg-green-400"></div>
                        <span class="text-gray-300">Home Section</span>
                    </div>
                    <span class="text-xs text-gray-500">Configured</span>
                </div>
                <div class="flex items-center justify-between p-3 rounded-lg bg-base-300">
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 rounded-full bg-green-400"></div>
                        <span class="text-gray-300">Projects</span>
                    </div>
                    <span class="text-xs text-gray-500"><?= $projectCount ?? 0 ?> items</span>
                </div>
                <div class="flex items-center justify-between p-3 rounded-lg bg-base-300">
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 rounded-full bg-green-400"></div>
                        <span class="text-gray-300">Tech Stack</span>
                    </div>
                    <span class="text-xs text-gray-500"><?= $techCount ?? 0 ?> items</span>
                </div>
                <div class="flex items-center justify-between p-3 rounded-lg bg-base-300">
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 rounded-full bg-green-400"></div>
                        <span class="text-gray-300">Certifications</span>
                    </div>
                    <span class="text-xs text-gray-500"><?= $certCount ?? 0 ?> items</span>
                </div>
                <div class="flex items-center justify-between p-3 rounded-lg bg-base-300">
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 rounded-full bg-green-400"></div>
                        <span class="text-gray-300">Services</span>
                    </div>
                    <span class="text-xs text-gray-500"><?= $serviceCount ?? 0 ?> items</span>
                </div>
                <div class="flex items-center justify-between p-3 rounded-lg bg-base-300">
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 rounded-full bg-green-400"></div>
                        <span class="text-gray-300">Contact Info</span>
                    </div>
                    <span class="text-xs text-gray-500">Configured</span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php View::endSection() ?>