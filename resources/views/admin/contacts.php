<?php

use app\core\View;

?>
<?php View::extend('admin/layout') ?>

<?php View::section('title') ?>Contact Info<?php View::endSection() ?>

<?php View::section('page-title') ?>Contact Information<?php View::endSection() ?>
<?php View::section('page-description') ?>Manage your contact details and social links<?php View::endSection() ?>

<?php View::section('content') ?>
<div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
    <!-- Form Card -->
    <div class="card">
        <div class="card-body">
            <div class="card-actions justify-between">
                <h3 class="card-title">Update Contact Information</h3>
                <span class="badge badge-primary badge-soft">Single Entry</span>
            </div>
            <div class="divider"></div>

            <?php if (has_flash('success')): ?>
                <div role="alert" class="alert alert-success alert-soft mb-2">
                    <span><?= get_flash('success') ?></span>
                </div>
            <?php endif ?>

            <form action="<?= base_url('admin/contacts/store') ?>" method="POST">
                <?= csrf_field() ?>

                <?php if (!empty($contact['contact_id'])): ?>
                    <input type="hidden" name="contact_id" value="<?= $contact['contact_id'] ?>">
                <?php endif; ?>

                <div class="space-y-6">
                    <!-- Basic Contact Info -->
                    <div class="p-4 rounded-lg bg-base-300">
                        <h4 class="mb-4 text-sm font-semibold text-pink-400 uppercase tracking-wider">Basic Information</h4>

                        <fieldset class="fieldset">

                            <!-- Email -->

                            <div>
                                <legend class="modal-label">Email Address
                                    <span class="text-pink-400 text-xs">Required</span>
                                </legend>
                                <label class="input">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <input type="email" name="email" value="<?= $contact['email'] ?? '' ?>"
                                        placeholder="your@email.com" required>
                                </label>
                            </div>

                            <!-- Address -->
                            <div>
                                <legend class="modal-label">Address / Location
                                    <span class="text-pink-400 text-xs">Required</span>
                                </legend>
                                <label class="input">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <input type="text" name="address" value="<?= $contact['address'] ?? '' ?>"
                                        placeholder="City, Country" required>
                                </label>
                            </div>
                        </fieldset>
                    </div>

                    <!-- Social Links -->
                    <div class="p-4 rounded-lg bg-base-300">
                        <h4 class="mb-4 text-sm font-semibold text-pink-400 uppercase tracking-wider">Social Media Links</h4>

                        <fieldset class="fieldset">
                            <!-- GitHub -->
                            <div>
                                <legend class="modal-label">GitHub Profile</legend>
                                <label class="input">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                                    </svg>
                                    <input type="url" name="github_link" value="<?= $contact['github_link'] ?? '' ?>"
                                        placeholder="https://github.com/username">
                                </label>
                            </div>

                            <!-- LinkedIn -->
                            <div>
                                <legend class="modal-label">LinkedIn Profile</legend>
                                <label class="input">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                    </svg>
                                    <input type="url" name="linkedin_link" value="<?= $contact['linkedin_link'] ?? '' ?>"
                                        placeholder="https://linkedin.com/in/username">
                                </label>
                            </div>

                            <!-- Instagram -->
                            <div>
                                <legend class="modal-label">Instagram Profile</legend>
                                <label class="input">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                    </svg>
                                    <input type="url" name="instagram_link" value="<?= $contact['instagram_link'] ?? '' ?>"
                                        placeholder="https://instagram.com/username">
                                </label>
                            </div>
                        </fieldset>
                    </div>

                    <!-- Divider -->
                    <div class="border-t border-pink-500/10"></div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col gap-3 sm:flex-row sm:justify-end">
                        <a href="<?= base_url('admin') ?>" class="btn btn-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Save Changes
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Preview Card (Side) -->
    <div class="card h-fit lg:sticky lg:top-6">
        <div class="card-body">
            <div class="card-actions justify-between">
                <h3 class="card-title">Live Preview</h3>
                <span class="text-xs text-gray-500">How it will appear on your site</span>
            </div>
            <div class="divider"></div>

            <!-- Contact Info Preview -->
            <div class="p-6 rounded-lg bg-gradient-to-br from-pink-500/10 to-rose-500/10 border border-pink-500/20">
                <h4 class="mb-4 text-sm font-semibold text-pink-400 uppercase tracking-wider">Contact Info</h4>

                <div class="space-y-3">
                    <div class="flex items-center gap-3">
                        <div class="flex items-center justify-center w-10 h-10 rounded-full bg-pink-500/20">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400">Email</p>
                            <p class="text-sm text-white" id="preview-email"><?= $contact['email'] ?? 'your@email.com' ?></p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="flex items-center justify-center w-10 h-10 rounded-full bg-pink-500/20">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400">Location</p>
                            <p class="text-sm text-white" id="preview-address"><?= $contact['address'] ?? 'City, Country' ?></p>
                        </div>
                    </div>
                </div>

                <!-- Social Links Preview -->
                <h4 class="mt-6 mb-4 text-sm font-semibold text-pink-400 uppercase tracking-wider">Social Links</h4>
                <div class="flex gap-3">
                    <a id="preview-github" href="<?= $contact['github_link'] ?? '#' ?>" target="_blank"
                        class="flex items-center justify-center w-10 h-10 transition-all duration-200 border rounded-full border-white/30 bg-white/10 hover:bg-pink-500/20 hover:border-pink-500/50 <?= empty($contact['github_link']) ? 'opacity-30' : '' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                        </svg>
                    </a>
                    <a id="preview-linkedin" href="<?= $contact['linkedin_link'] ?? '#' ?>" target="_blank"
                        class="flex items-center justify-center w-10 h-10 transition-all duration-200 border rounded-full border-white/30 bg-white/10 hover:bg-blue-500/20 hover:border-blue-500/50 <?= empty($contact['linkedin_link']) ? 'opacity-30' : '' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                        </svg>
                    </a>
                    <a id="preview-instagram" href="<?= $contact['instagram_link'] ?? '#' ?>" target="_blank"
                        class="flex items-center justify-center w-10 h-10 transition-all duration-200 border rounded-full border-white/30 bg-white/10 hover:bg-pink-500/20 hover:border-pink-500/50 <?= empty($contact['instagram_link']) ? 'opacity-30' : '' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php View::endSection() ?>

<?php View::section('scripts') ?>
<script>
    // Live preview updates
    document.querySelector('input[name="email"]')?.addEventListener('input', (e) => {
        document.getElementById('preview-email').textContent = e.target.value || 'your@email.com';
    });

    document.querySelector('input[name="address"]')?.addEventListener('input', (e) => {
        document.getElementById('preview-address').textContent = e.target.value || 'City, Country';
    });

    document.querySelector('input[name="github_link"]')?.addEventListener('input', (e) => {
        const link = document.getElementById('preview-github');
        link.href = e.target.value || '#';
        link.classList.toggle('opacity-30', !e.target.value);
    });

    document.querySelector('input[name="linkedin_link"]')?.addEventListener('input', (e) => {
        const link = document.getElementById('preview-linkedin');
        link.href = e.target.value || '#';
        link.classList.toggle('opacity-30', !e.target.value);
    });

    document.querySelector('input[name="instagram_link"]')?.addEventListener('input', (e) => {
        const link = document.getElementById('preview-instagram');
        link.href = e.target.value || '#';
        link.classList.toggle('opacity-30', !e.target.value);
    });
</script>
<?php View::endSection() ?>