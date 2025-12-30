<?php

use app\core\View;

?>
<?php View::extend('admin/layout') ?>

<?php View::section('title') ?>Services<?php View::endSection() ?>

<?php View::section('page-title') ?>Services<?php View::endSection() ?>
<?php View::section('page-description') ?>Manage your offered services<?php View::endSection() ?>

<?php View::section('content') ?>
<?php if (has_flash('success')): ?>
    <div role="alert" class="alert alert-success alert-soft mb-2">
        <span><?= get_flash('success') ?></span>
    </div>
<?php endif ?>
<div class="card">
    <div class="card-body">
        <div class="card-actions justify-between">
            <h3 class="card-title">All Services</h3>
            <button onclick="openAddModal()" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Add Service
            </button>
        </div>
        <div class="divider"></div>

        <!-- Services Grid -->
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            <?php if (!empty($services)): ?>
                <?php foreach ($services as $service): ?>
                    <?php $desc = json_decode($service['description_json'], true); ?>
                    <div class="p-5 transition-all duration-300 border rounded-lg bg-base-300 border-pink-500/10 hover:border-pink-500/30 group">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-pink-500/20">
                                    <?php if (!empty($service['icon'])): ?>
                                        <img src="<?= base_url($service['icon']) ?>" alt="" class="w-5 h-5">
                                    <?php else: ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    <?php endif; ?>
                                </div>
                                <h4 class="font-semibold text-white"><?= htmlspecialchars($service['title']) ?></h4>
                            </div>
                            <div class="flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button onclick='openEditModal(<?= json_encode($service) ?>)' class="btn btn-ghost btn-xs text-gray-400 hover:text-pink-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                <button onclick="confirmDelete(<?= $service['service_id'] ?>, '<?= htmlspecialchars($service['title']) ?>')" class="btn btn-ghost btn-xs text-gray-400 hover:text-red-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <p class="mb-3 text-sm text-gray-400"><?= htmlspecialchars($desc['short_info'] ?? '') ?></p>
                        <?php if (!empty($desc['features'])): ?>
                            <ul class="space-y-1">
                                <?php foreach ($desc['features'] as $feature): ?>
                                    <li class="flex items-center text-xs text-gray-500">
                                        <span class="w-1.5 h-1.5 mr-2 bg-pink-400 rounded-full"></span>
                                        <?= htmlspecialchars($feature) ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-span-full flex flex-col items-center gap-4 py-12">
                    <div class="flex items-center justify-center w-16 h-16 rounded-full bg-pink-500/10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="text-center">
                        <p class="text-gray-300">No services yet</p>
                        <p class="text-sm text-gray-500">Click "Add Service" to showcase your offerings</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Add/Edit Service Modal -->
<dialog id="serviceModal" class="modal">
    <div class="modal-box !max-w-2xl">
        <form id="serviceForm" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="_method" id="formMethod" value="POST">
            <input type="hidden" name="service_id" id="serviceId">
            <input type="hidden" name="description_json" id="descriptionJson">

            <h3 class="modal-title" id="modalTitle">Add New Service</h3>

            <fieldset class="fieldset">
                <!-- Service Title -->
                <label class="modal-label">Service Title <span class="text-pink-400 text-xs">Required</span></label>
                <input type="text" name="title" id="serviceTitle" class="input" placeholder="e.g., Web Development" required>

                <!-- Service Icon -->
                <label class="modal-label">Icon</label>
                <div id="currentIconPreview" class="hidden mb-2 flex items-center gap-3 p-2 rounded bg-base-300">
                    <img id="iconPreview" src="" alt="" class="w-6 h-6">
                    <span class="text-xs text-gray-400">Current</span>
                </div>
                <input type="file" name="icon" accept="image/*,.svg" class="file-input">

                <!-- Short Description -->
                <label class="modal-label">Short Description</label>
                <textarea id="shortInfo" rows="2" class="textarea" placeholder="Brief overview of this service..."></textarea>

                <!-- Features Builder -->
                <div class="flex items-center justify-between">
                    <label class="modal-label">Features (Bullet Points)</label>
                    <button type="button" onclick="addFeature()" class="btn btn-xs bg-pink-500/20 text-pink-400 border-none hover:bg-pink-500/30">+ Add</button>
                </div>
                <div id="featuresContainer" class="space-y-2">
                    <!-- Features will be added here dynamically -->
                </div>
                <p class="label text-gray-500">Add bullet points that describe what this service includes</p>
            </fieldset>

            <div class="modal-action">
                <button type="button" onclick="closeModal()" class="btn btn-secondary">Cancel</button>
                <button type="submit" class="btn btn-primary"><span id="submitBtnText">Add Service</span></button>
            </div>
        </form>
    </div>
    <form method="dialog" class="modal-backdrop"><button>close</button></form>
</dialog>

<!-- Delete Modal -->
<dialog id="deleteModal" class="modal">
    <div class="modal-box !max-w-md">
        <h3 class="modal-title">Confirm Delete</h3>
        <p class="text-gray-300">Delete "<span id="deleteServiceName" class="text-pink-400"></span>"?</p>
        <form id="deleteForm" method="POST">

            <input type="hidden" name="_method" value="POST">
            <div class="modal-action">
                <button type="button" onclick="document.getElementById('deleteModal').close()" class="btn btn-secondary">Cancel</button>
                <button type="submit" class="btn btn-error">Delete</button>
            </div>
        </form>
    </div>
    <form method="dialog" class="modal-backdrop"><button>close</button></form>
</dialog>
<?php View::endSection() ?>

<?php View::section('scripts') ?>
<script>
    const modal = document.getElementById('serviceModal');
    const form = document.getElementById('serviceForm');
    let features = [];

    function renderFeatures() {
        const container = document.getElementById('featuresContainer');
        container.innerHTML = features.map((f, i) => `
            <div class="feature-item">
                <span class="feature-item-drag">⋮⋮</span>
                <input type="text" value="${f}" onchange="updateFeature(${i}, this.value)" class="flex-1 bg-transparent border-none text-gray-300 text-sm focus:outline-none" placeholder="Feature description">
                <button type="button" onclick="removeFeature(${i})" class="text-red-400 hover:text-red-300">×</button>
            </div>
        `).join('');
    }

    function addFeature() {
        features.push('');
        renderFeatures();
        document.getElementById('featuresContainer').lastElementChild?.querySelector('input')?.focus();
    }

    function updateFeature(index, value) {
        features[index] = value;
    }

    function removeFeature(index) {
        features.splice(index, 1);
        renderFeatures();
    }

    function buildJson() {
        return JSON.stringify({
            short_info: document.getElementById('shortInfo').value,
            features: features.filter(f => f.trim())
        });
    }

    function openAddModal() {
        document.getElementById('modalTitle').textContent = 'Add New Service';
        document.getElementById('submitBtnText').textContent = 'Add Service';
        document.getElementById('formMethod').value = 'POST';
        form.action = '<?= base_url('admin/services/store') ?>';
        form.reset();
        features = [''];
        renderFeatures();
        document.getElementById('currentIconPreview').classList.add('hidden');
        modal.showModal();
    }

    function openEditModal(service) {
        document.getElementById('modalTitle').textContent = 'Edit Service';
        document.getElementById('submitBtnText').textContent = 'Update Service';
        document.getElementById('formMethod').value = 'POST';
        form.action = '<?= base_url('admin/services/store') ?>';

        document.getElementById('serviceId').value = service.service_id;
        document.getElementById('serviceTitle').value = service.title;

        const desc = JSON.parse(service.description_json || '{}');
        document.getElementById('shortInfo').value = desc.short_info || '';
        features = desc.features || [''];
        renderFeatures();

        if (service.icon) {
            document.getElementById('currentIconPreview').classList.remove('hidden');
            document.getElementById('iconPreview').src = '<?= base_url() ?>' + service.icon;
        } else {
            document.getElementById('currentIconPreview').classList.add('hidden');
        }
        modal.showModal();
    }

    function closeModal() {
        modal.close();
    }

    function confirmDelete(id, name) {
        document.getElementById('deleteServiceName').textContent = name;
        document.getElementById('deleteForm').action = '<?= base_url('admin/services/delete') ?>/' + id;
        document.getElementById('deleteModal').showModal();
    }

    form.addEventListener('submit', () => {
        document.getElementById('descriptionJson').value = buildJson();
    });
</script>
<?php View::endSection() ?>