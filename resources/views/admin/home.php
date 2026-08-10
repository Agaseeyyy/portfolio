<?php

/**
 * Admin Home Section
 * 
 * @var string $pageTitle
 * @var string $pageDescription
 * @var string $activeMenu
 * @var array $data
 * @var string $photoSrc - Profile photo path (from controller)
 */

use app\core\View;

// Extend the admin layout
View::extend('admin/layout');
?>

<?php View::section('title') ?>
<?= $pageTitle ?? 'Home Section' ?>
<?php View::endSection() ?>

<?php View::section('content') ?>
<div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
    <!-- Form Card -->
    <div class="card">
        <div class="card-body">
            <div class="card-actions justify-between">
                <h3 class="card-title">Update Home &amp; Character Stats</h3>
                <span class="badge badge-primary badge-soft">Single Entry</span>
            </div>

            <div class="divider"></div>

            <?php if ($successMsg = get_flash('success')): ?>
                <div role="alert" class="alert alert-success alert-soft">
                    <span><?= htmlspecialchars($successMsg) ?></span>
                </div>
            <?php endif ?>

            <?php if ($errorMsg = get_flash('error')): ?>
                <div role="alert" class="alert alert-error alert-soft">
                    <span><?= htmlspecialchars($errorMsg) ?></span>
                </div>
            <?php endif ?>

            <form action="<?= base_url('admin/home/store') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <?php if (!empty($data['id'])): ?>
                    <input type="hidden" name="id" value="<?= htmlspecialchars($data['id'] ?? '') ?>">
                <?php endif; ?>

                <fieldset class="fieldset">
                    <!-- Name Field -->
                    <label class="modal-label">Full Name <span class="text-pink-400 text-xs right-0">Required</span></label>
                    <input type="text" name="name" value="<?= htmlspecialchars($data['name'] ?? '') ?>"
                        placeholder="e.g., Agassi Bustarga"
                        class="input" required>
                    <p class="label text-gray-500">Your display name shown on the hero section</p>

                    <!-- Role Field -->
                    <label class="modal-label">Role / Character Class <span class="text-pink-400 text-xs right-0">Required</span></label>
                    <input type="text" name="role" value="<?= htmlspecialchars($data['role'] ?? '') ?>"
                        placeholder="e.g., Full-stack Developer"
                        class="input w-full bg-base-300" required>
                    <p class="label text-gray-500">Your professional title &amp; RPG class</p>

                    <!-- Short Bio Field -->
                    <label class="modal-label">Short Bio <span class="text-pink-400 text-xs right-0">Required</span></label>
                    <textarea name="short_bio" rows="4"
                        placeholder="A brief description about yourself..."
                        class="textarea w-full bg-base-300" required><?= htmlspecialchars($data['short_bio'] ?? '') ?></textarea>
                    <p class="label text-gray-500">A compelling hero introduction</p>

                    <!-- Character RPG Stats Section -->
                    <div class="p-4 my-4 rounded-lg bg-base-300/50 border border-gray-700">
                        <h4 class="text-sm font-bold text-yellow-400 mb-3 uppercase tracking-wider">🎮 Character Stats (RPG Header)</h4>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <!-- HP Percentage -->
                            <div>
                                <label class="modal-label">HP Percentage (%)</label>
                                <input type="number" name="hp_percentage" min="1" max="100" value="<?= htmlspecialchars($data['hp_percentage'] ?? '100') ?>" class="input w-full">
                                <p class="label text-gray-500">Health bar fill (1-100)</p>
                            </div>

                            <!-- EXP Percentage -->
                            <div>
                                <label class="modal-label">EXP Percentage (%)</label>
                                <input type="number" name="exp_percentage" min="0" max="100" value="<?= htmlspecialchars($data['exp_percentage'] ?? '85') ?>" class="input w-full">
                                <p class="label text-gray-500">Experience bar fill (0-100)</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mt-3">
                            <!-- Level Text -->
                            <div>
                                <label class="modal-label">Level Subtext</label>
                                <input type="text" name="level_text" value="<?= htmlspecialchars($data['level_text'] ?? '5 Years Experience') ?>" placeholder="e.g. 5 Years Experience" class="input w-full">
                            </div>

                            <!-- Weapon Text -->
                            <div>
                                <label class="modal-label">Weapon Subtext</label>
                                <input type="text" name="weapon_text" value="<?= htmlspecialchars($data['weapon_text'] ?? 'Code & Creativity') ?>" placeholder="e.g. Code &amp; Creativity" class="input w-full">
                            </div>
                        </div>
                    </div>

                    <!-- Profile Photo -->
                    <label class="modal-label">Profile Photo <span class="text-gray-500 text-xs">Optional</span></label>

                    <!-- Current Photo Preview -->
                    <div class="flex items-center gap-4 p-4 mb-4 rounded-lg bg-base-300">
                        <div class="w-20 h-20 overflow-hidden rounded-full ring-2 ring-pink-500/50">
                            <img id="current-photo" src="<?= base_url($photoSrc) ?>" alt="Current Photo" class="object-cover w-full h-full">
                        </div>
                        <div>
                            <p class="text-sm text-gray-300">Current Photo</p>
                            <p class="text-xs text-gray-500"><?= !empty($data['profile_photo']) ? $data['profile_photo'] : 'Using default avatar' ?></p>
                        </div>
                    </div>

                    <input type="file" name="profile_photo" accept="image/*" class="file-input w-full bg-base-300">
                    <p class="label text-gray-500">Recommended: Square image, at least 400x400px</p>

                    <!-- Divider -->
                    <div class="divider"></div>

                    <!-- Action Buttons -->
                    <div class="card-actions justify-end">
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
                </fieldset>
            </form>
        </div>
    </div>

    <!-- Preview Card (Side) -->
    <div class="card h-fit">
        <div class="card-body">
            <div class="card-actions justify-between">
                <h3 class="text-lg font-semibold text-white">Live Preview</h3>
                <span class="text-xs text-gray-500">How it will appear on your site</span>
            </div>

            <div class="divider"></div>

            <div class="p-6 border rounded-lg bg-gradient-to-br from-pink-500/10 to-rose-500/10 border-pink-500/20">
                <div class="flex flex-col items-center gap-6">
                    <div class="w-32 h-32 overflow-hidden rounded-full ring-2 ring-pink-500/50 bg-base-300">
                        <img id="preview-photo" src="<?= base_url($photoSrc) ?>" alt="Preview" class="object-cover w-full h-full">
                    </div>
                    <div class="text-center">
                        <p class="text-pink-400">Hi, I'm <span id="preview-name"><?= htmlspecialchars($data['name'] ?? 'Your Name') ?></span></p>
                        <h2 class="text-xl font-bold text-white">Full-stack Web</h2>
                        <p class="text-pink-400" id="preview-role"><?= htmlspecialchars($data['role'] ?? 'Your Role') ?></p>
                        <p class="mt-3 text-sm text-gray-300" id="preview-bio"><?= htmlspecialchars($data['short_bio'] ?? 'Your short bio will appear here...') ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php View::endSection() ?>

<?php View::section('scripts') ?>
<script>
    // Live preview updates
    document.querySelector('input[name="name"]')?.addEventListener('input', (e) => {
        document.getElementById('preview-name').textContent = e.target.value || 'Your Name';
    });

    document.querySelector('input[name="role"]')?.addEventListener('input', (e) => {
        document.getElementById('preview-role').textContent = e.target.value || 'Your Role';
    });

    document.querySelector('textarea[name="short_bio"]')?.addEventListener('input', (e) => {
        document.getElementById('preview-bio').textContent = e.target.value || 'Your short bio will appear here...';
    });

    // Live image preview
    document.querySelector('input[name="profile_photo"]')?.addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                document.getElementById('preview-photo').src = e.target.result;
                document.getElementById('current-photo').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
<?php View::endSection() ?>