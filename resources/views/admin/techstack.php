<?php
use app\core\View;

?>
<?php View::extend('admin/layout') ?>

<?php View::section('title') ?>Tech Stack<?php View::endSection() ?>

<?php View::section('page-title') ?>Tech Stack<?php View::endSection() ?>
<?php View::section('page-description') ?>Manage your technology skills and tools<?php View::endSection() ?>

<?php View::section('content') ?>
<?php if (has_flash('success')): ?>
<div role="alert" class="alert alert-success alert-soft mb-2">
    <span><?= get_flash('success') ?></span>
</div>
<?php endif ?>

<div class="admin-card">

    <div class="admin-card-header">
        <h3 class="text-lg font-semibold text-white">All Technologies</h3>
        <button onclick="openAddModal()" class="admin-btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Add Technology
        </button>
    </div>

    <!-- Tech Stack Grid -->
    <div class="space-y-6">
        <?php if (!empty($techstack)): ?>
            <?php foreach ($techCategories as $catKey => $category): ?>
                <?php if (!empty($category['items'])): ?>
                <div>
                    <h4 class="mb-3 text-sm font-semibold text-pink-400 uppercase tracking-wider"><?= $category['label'] ?></h4>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                        <?php foreach ($category['items'] as $tech): ?>
                        <div class="flex items-center justify-between p-4 transition-all duration-200 border rounded-lg bg-base-300 border-pink-500/10 hover:border-pink-500/30 group">
                            <div class="flex items-center gap-3">
                                <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-pink-500/10">
                                    <?php if (!empty($tech['icon'])): ?>
                                    <img src="<?= base_url($tech['icon']) ?>" alt="<?= htmlspecialchars($tech['tech_name']) ?>" class="w-6 h-6">
                                    <?php else: ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                    </svg>
                                    <?php endif; ?>
                                </div>
                                <span class="font-medium text-gray-300"><?= htmlspecialchars($tech['tech_name']) ?></span>
                            </div>
                            <div class="flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button onclick="openEditModal(<?= htmlspecialchars(json_encode($tech), ENT_QUOTES, 'UTF-8') ?>)" class="btn btn-ghost btn-xs text-gray-400 hover:text-pink-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                <button onclick="confirmDelete(<?= $tech['tech_id'] ?>, '<?= htmlspecialchars($tech['tech_name']) ?>')" class="btn btn-ghost btn-xs text-gray-400 hover:text-red-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else: ?>
        <div class="flex flex-col items-center gap-4 py-12">
            <div class="flex items-center justify-center w-16 h-16 rounded-full bg-pink-500/10">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                </svg>
            </div>
            <div class="text-center">
                <p class="text-gray-300">No technologies added yet</p>
                <p class="text-sm text-gray-500">Click "Add Technology" to add your skills</p>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- Add/Edit Tech Modal -->
<dialog id="techModal" class="modal">
    <div class="admin-modal-box max-w-md">
        <form id="techForm" method="POST" enctype="multipart/form-data">
            
            <input type="hidden" name="_method" id="formMethod" value="POST">
            <input type="hidden" name="tech_id" id="techId">
            
            <h3 class="admin-modal-title" id="modalTitle">Add New Technology</h3>
            
            <div class="space-y-4">
                <!-- Tech Name -->
                <div class="form-control">
                    <label class="label">
                        <span class="text-gray-300 label-text">Technology Name</span>
                        <span class="text-pink-400 label-text-alt">Required</span>
                    </label>
                    <input type="text" name="tech_name" id="techName" class="admin-input" placeholder="e.g., React, PHP, Python" required>
                </div>

                <!-- Category -->
                <div class="form-control">
                    <label class="label">
                        <span class="text-gray-300 label-text">Category</span>
                        <span class="text-pink-400 label-text-alt">Required</span>
                    </label>
                    <select name="category" id="techCategory" class="admin-input" required>
                        <option value="frontend">Frontend</option>
                        <option value="backend">Backend</option>
                        <option value="database">Database</option>
                        <option value="tools">Tools & Others</option>
                    </select>
                </div>

                <!-- Tech Icon -->
                <div class="form-control">
                    <label class="label">
                        <span class="text-gray-300 label-text">Icon</span>
                        <span class="text-gray-500 label-text-alt">SVG or PNG recommended</span>
                    </label>
                    <div id="currentIconPreview" class="hidden mb-3 flex items-center gap-3 p-3 rounded-lg bg-base-300">
                        <img id="iconPreview" src="" alt="Current Icon" class="w-8 h-8">
                        <span class="text-sm text-gray-400">Current icon</span>
                    </div>
                    <input type="file" name="icon" accept="image/*,.svg" class="admin-file-input">
                </div>
            </div>

            <div class="modal-action">
                <button type="button" onclick="closeModal()" class="admin-btn-secondary">Cancel</button>
                <button type="submit" class="admin-btn-primary">
                    <span id="submitBtnText">Add Technology</span>
                </button>
            </div>
        </form>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

<!-- Delete Confirmation Modal -->
<dialog id="deleteModal" class="modal">
    <div class="admin-modal-box max-w-md">
        <h3 class="admin-modal-title">Confirm Delete</h3>
        <p class="text-gray-300">Are you sure you want to delete "<span id="deleteTechName" class="text-pink-400"></span>"?</p>
        <p class="mt-2 text-sm text-gray-500">This will also remove it from all associated projects.</p>
        
        <form id="deleteForm" method="POST">
            
            <input type="hidden" name="_method" value="POST">
            
            <div class="modal-action">
                <button type="button" onclick="document.getElementById('deleteModal').close()" class="admin-btn-secondary">Cancel</button>
                <button type="submit" class="btn bg-red-500 hover:bg-red-600 text-white border-none">Delete</button>
            </div>
        </form>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
<?php View::endSection() ?>

<?php View::section('scripts') ?>
<script>
    const modal = document.getElementById('techModal');
    const form = document.getElementById('techForm');

    function openAddModal() {
        document.getElementById('modalTitle').textContent = 'Add New Technology';
        document.getElementById('submitBtnText').textContent = 'Add Technology';
        document.getElementById('formMethod').value = 'POST';
        form.action = '<?= base_url('admin/techstack/store') ?>';
        form.reset();
        document.getElementById('currentIconPreview').classList.add('hidden');
        modal.showModal();
    }

    function openEditModal(tech) {
        document.getElementById('modalTitle').textContent = 'Edit Technology';
        document.getElementById('submitBtnText').textContent = 'Update Technology';
        document.getElementById('formMethod').value = 'POST';
        form.action = '<?= base_url('admin/techstack/store') ?>';
        
        document.getElementById('techId').value = tech.tech_id;
        document.getElementById('techName').value = tech.tech_name;
        document.getElementById('techCategory').value = tech.category || 'tools';
        
        if (tech.icon) {
            document.getElementById('currentIconPreview').classList.remove('hidden');
            document.getElementById('iconPreview').src = '<?= base_url() ?>' + tech.icon;
        } else {
            document.getElementById('currentIconPreview').classList.add('hidden');
        }
        
        modal.showModal();
    }

    function closeModal() {
        modal.close();
    }

    function confirmDelete(id, name) {
        document.getElementById('deleteTechName').textContent = name;
        document.getElementById('deleteForm').action = '<?= base_url('admin/techstack/delete') ?>/' + id;
        document.getElementById('deleteModal').showModal();
    }
</script>
<?php View::endSection() ?>



