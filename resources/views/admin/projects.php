<?php
use app\core\View;

?>
<?php View::extend('admin/layout') ?>

<?php View::section('title') ?>Projects<?php View::endSection() ?>

<?php View::section('page-title') ?>Projects<?php View::endSection() ?>
<?php View::section('page-description') ?>Manage your portfolio projects<?php View::endSection() ?>

<?php View::section('content') ?>
<?php if (has_flash('success')): ?>
<div role="alert" class="alert alert-success alert-soft mb-2">
    <span><?= get_flash('success') ?></span>
</div>
<?php endif ?>

<div class="admin-card">
    <div class="admin-card-header">
        <h3 class="text-lg font-semibold text-white">All Projects</h3>
        <button onclick="openAddModal()" class="admin-btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Add Project
        </button>
    </div>

    <!-- Projects Table -->
    <div class="overflow-x-auto">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Project Name</th>
                    <th>Technologies</th>
                    <th>Date</th>
                    <th>Links</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($projects)): ?>
                    <?php foreach ($projects as $project): ?>
                    <tr>
                        <td>
                            <div class="w-16 h-12 overflow-hidden rounded-lg bg-base-300">
                                <?php if (!empty($project['image'])): ?>
                                <img src="<?= base_url($project['image']) ?>" alt="<?= htmlspecialchars($project['project_name']) ?>" class="object-cover w-full h-full">
                                <?php else: ?>
                                <div class="flex items-center justify-center w-full h-full text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td>
                            <div>
                                <p class="font-medium text-white"><?= htmlspecialchars($project['project_name']) ?></p>
                                <p class="text-xs text-gray-500 line-clamp-1"><?= htmlspecialchars($project['description'] ?? '') ?></p>
                            </div>
                        </td>
                        <td>
                            <div class="flex flex-wrap gap-1">
                                <?php if (!empty($project['technologies'])): ?>
                                    <?php foreach (array_slice($project['technologies'], 0, 3) as $tech): ?>
                                    <span class="admin-badge text-xs"><?= htmlspecialchars($tech['tech_name']) ?></span>
                                    <?php endforeach; ?>
                                    <?php if (count($project['technologies']) > 3): ?>
                                    <span class="text-xs text-gray-500">+<?= count($project['technologies']) - 3 ?></span>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <span class="text-xs text-gray-500">No tech</span>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td>
                            <span class="text-sm text-gray-400"><?= date('M Y', strtotime($project['start_date'])) ?></span>
                        </td>
                        <td>
                            <div class="flex gap-2">
                                <?php if (!empty($project['preview_link'])): ?>
                                <a href="<?= htmlspecialchars($project['preview_link']) ?>" target="_blank" class="text-blue-400 hover:text-blue-300" title="Preview">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                <?php endif; ?>
                                <?php if (!empty($project['project_link'])): ?>
                                <a href="<?= htmlspecialchars($project['project_link']) ?>" target="_blank" class="text-pink-400 hover:text-pink-300" title="Repository">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                    </svg>
                                </a>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td>
                            <div class="flex justify-end gap-2">
                                <button onclick="openEditModal(<?= htmlspecialchars(json_encode($project), ENT_QUOTES, 'UTF-8') ?>)" class="admin-btn-ghost btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                <button onclick="confirmDelete(<?= $project['project_id'] ?>, '<?= htmlspecialchars($project['project_name']) ?>')" class="admin-btn-ghost btn-sm text-red-400 hover:bg-red-500/10">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center py-12">
                        <div class="flex flex-col items-center gap-4">
                            <div class="flex items-center justify-center w-16 h-16 rounded-full bg-pink-500/10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-300">No projects yet</p>
                                <p class="text-sm text-gray-500">Click "Add Project" to create your first project</p>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Add/Edit Project Modal -->
<dialog id="projectModal" class="modal">
    <div class="admin-modal-box max-w-3xl">
        <form id="projectForm" method="POST" enctype="multipart/form-data">
            
            <input type="hidden" name="_method" id="formMethod" value="POST">
            <input type="hidden" name="project_id" id="projectId">
            
            <h3 class="admin-modal-title" id="modalTitle">Add New Project</h3>
            
            <div class="space-y-4">
                <!-- Project Name -->
                <div class="form-control">
                    <label class="label">
                        <span class="text-gray-300 label-text">Project Name</span>
                        <span class="text-pink-400 label-text-alt">Required</span>
                    </label>
                    <input type="text" name="project_name" id="projectName" class="admin-input" required>
                </div>

                <!-- Role -->
                <div class="form-control">
                    <label class="label">
                        <span class="text-gray-300 label-text">Your Role</span>
                    </label>
                    <input type="text" name="role" id="projectRole" class="admin-input" placeholder="e.g., Full-stack Developer, UI Designer">
                </div>

                <!-- Description -->
                <div class="form-control">
                    <label class="label">
                        <span class="text-gray-300 label-text">Short Description</span>
                    </label>
                    <textarea name="description" id="projectDescription" rows="2" class="admin-textarea" placeholder="Brief summary shown on project cards"></textarea>
                </div>

                <!-- Long Description -->
                <div class="form-control">
                    <label class="label">
                        <span class="text-gray-300 label-text">Detailed Description</span>
                    </label>
                    <textarea name="long_description" id="projectLongDescription" rows="4" class="admin-textarea" placeholder="In-depth project description for the detail page"></textarea>
                </div>

                <!-- Key Features -->
                <div class="form-control">
                    <label class="label">
                        <span class="text-gray-300 label-text">Key Features</span>
                        <span class="text-gray-500 label-text-alt">One per line</span>
                    </label>
                    <textarea name="key_features" id="projectKeyFeatures" rows="3" class="admin-textarea" placeholder="User authentication&#10;Real-time notifications&#10;Responsive design"></textarea>
                </div>

                <!-- Challenges -->
                <div class="form-control">
                    <label class="label">
                        <span class="text-gray-300 label-text">Challenges & Solutions</span>
                        <span class="text-gray-500 label-text-alt">One per line</span>
                    </label>
                    <textarea name="challenges" id="projectChallenges" rows="3" class="admin-textarea" placeholder="Implemented caching to handle high traffic&#10;Used WebSocket for real-time updates"></textarea>
                </div>

                <!-- Technologies Multi-select -->
                <div class="form-control">
                    <label class="label">
                        <span class="text-gray-300 label-text">Technologies Used</span>
                    </label>
                    <div id="techStackContainer" class="flex flex-wrap gap-2 p-3 rounded-lg bg-base-300 border border-pink-500/20 min-h-[60px]">
                        <?php if (!empty($techstack)): ?>
                            <?php foreach ($techstack as $tech): ?>
                            <label class="flex items-center gap-2 px-3 py-1.5 rounded-full bg-base-200 border border-pink-500/20 cursor-pointer hover:border-pink-500/40 transition-all tech-checkbox">
                                <input type="checkbox" name="technologies[]" value="<?= $tech['tech_id'] ?>" class="checkbox checkbox-xs checkbox-primary">
                                <span class="text-sm text-gray-300"><?= htmlspecialchars($tech['tech_name']) ?></span>
                            </label>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-sm text-gray-500">No tech stack available. <a href="<?= base_url('admin/techstack') ?>" class="text-pink-400">Add some first</a>.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <!-- Preview Link -->
                    <div class="form-control">
                        <label class="label">
                            <span class="text-gray-300 label-text">Preview Link</span>
                        </label>
                        <input type="url" name="preview_link" id="previewLink" class="admin-input" placeholder="https://...">
                    </div>

                    <!-- Project Link -->
                    <div class="form-control">
                        <label class="label">
                            <span class="text-gray-300 label-text">Repository Link</span>
                        </label>
                        <input type="url" name="project_link" id="projectLink" class="admin-input" placeholder="https://github.com/...">
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <!-- Start Date -->
                    <div class="form-control">
                        <label class="label">
                            <span class="text-gray-300 label-text">Start Date</span>
                            <span class="text-pink-400 label-text-alt">Required</span>
                        </label>
                        <input type="date" name="start_date" id="startDate" class="admin-input" required>
                    </div>

                    <!-- End Date -->
                    <div class="form-control">
                        <label class="label">
                            <span class="text-gray-300 label-text">End Date</span>
                            <span class="text-gray-500 label-text-alt">Leave empty if ongoing</span>
                        </label>
                        <input type="date" name="end_date" id="endDate" class="admin-input">
                    </div>
                </div>

                <!-- Project Image -->
                <div class="form-control">
                    <label class="label">
                        <span class="text-gray-300 label-text">Project Image</span>
                    </label>
                    <div id="currentImagePreview" class="hidden mb-3">
                        <img id="imagePreview" src="" alt="Current Image" class="h-32 rounded-lg object-cover">
                    </div>
                    <input type="file" name="image" accept="image/*" class="admin-file-input">
                </div>
            </div>

            <div class="modal-action">
                <button type="button" onclick="closeModal()" class="admin-btn-secondary">Cancel</button>
                <button type="submit" class="admin-btn-primary">
                    <span id="submitBtnText">Add Project</span>
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
        <p class="text-gray-300">Are you sure you want to delete "<span id="deleteProjectName" class="text-pink-400"></span>"?</p>
        <p class="mt-2 text-sm text-gray-500">This action cannot be undone.</p>
        
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
    const modal = document.getElementById('projectModal');
    const form = document.getElementById('projectForm');

    function openAddModal() {
        document.getElementById('modalTitle').textContent = 'Add New Project';
        document.getElementById('submitBtnText').textContent = 'Add Project';
        document.getElementById('formMethod').value = 'POST';
        form.action = '<?= base_url('admin/projects/store') ?>';
        form.reset();
        document.getElementById('currentImagePreview').classList.add('hidden');
        
        // Uncheck all tech checkboxes
        document.querySelectorAll('.tech-checkbox input').forEach(cb => cb.checked = false);
        
        modal.showModal();
    }

    function openEditModal(project) {
        document.getElementById('modalTitle').textContent = 'Edit Project';
        document.getElementById('submitBtnText').textContent = 'Update Project';
        document.getElementById('formMethod').value = 'POST';
        form.action = '<?= base_url('admin/projects/store') ?>';
        
        document.getElementById('projectId').value = project.project_id;
        document.getElementById('projectName').value = project.project_name;
        document.getElementById('projectRole').value = project.role || '';
        document.getElementById('projectDescription').value = project.description || '';
        document.getElementById('projectLongDescription').value = project.long_description || '';
        document.getElementById('previewLink').value = project.preview_link || '';
        document.getElementById('projectLink').value = project.project_link || '';
        document.getElementById('startDate').value = project.start_date;
        document.getElementById('endDate').value = project.end_date || '';
        
        // Parse JSON arrays to newline-separated text
        let keyFeatures = [];
        let challenges = [];
        try {
            keyFeatures = JSON.parse(project.key_features || '[]');
        } catch(e) { keyFeatures = []; }
        try {
            challenges = JSON.parse(project.challenges || '[]');
        } catch(e) { challenges = []; }
        
        document.getElementById('projectKeyFeatures').value = Array.isArray(keyFeatures) ? keyFeatures.join('\n') : '';
        document.getElementById('projectChallenges').value = Array.isArray(challenges) ? challenges.join('\n') : '';
        
        // Show current image if exists
        if (project.image) {
            document.getElementById('currentImagePreview').classList.remove('hidden');
            document.getElementById('imagePreview').src = '<?= base_url() ?>' + project.image;
        } else {
            document.getElementById('currentImagePreview').classList.add('hidden');
        }
        
        // Set technology checkboxes
        document.querySelectorAll('.tech-checkbox input').forEach(cb => {
            cb.checked = project.technologies?.some(t => t.tech_id == cb.value) || false;
        });
        
        modal.showModal();
    }

    function closeModal() {
        modal.close();
    }

    function confirmDelete(id, name) {
        document.getElementById('deleteProjectName').textContent = name;
        document.getElementById('deleteForm').action = '<?= base_url('admin/projects/delete') ?>/' + id;
        document.getElementById('deleteModal').showModal();
    }
</script>
<?php View::endSection() ?>




