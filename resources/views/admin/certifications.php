<?php

use app\core\View;

?>
<?php View::extend('admin/layout') ?>

<?php View::section('title') ?>Certifications<?php View::endSection() ?>

<?php View::section('page-title') ?>Certifications<?php View::endSection() ?>
<?php View::section('page-description') ?>Manage your certification images<?php View::endSection() ?>

<?php View::section('content') ?>
<?php if (has_flash('success')): ?>
    <div role="alert" class="alert alert-success alert-soft mb-2">
        <span><?= get_flash('success') ?></span>
    </div>
<?php endif ?>

<div class="card">
    <div class="card-body">
        <div class="card-actions justify-between">
            <h3 class="card-title">All Certifications</h3>
            <button onclick="openAddModal()" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Add Certification
            </button>
        </div>
        <div class="divider"></div>

        <!-- Certifications Grid -->
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            <?php if (!empty($certifications)): ?>
                <?php foreach ($certifications as $cert): ?>
                    <div class="relative overflow-hidden transition-all duration-300 border rounded-lg group bg-base-300 border-pink-500/10 hover:border-pink-500/30">
                        <!-- Image Container -->
                        <div class="relative aspect-[4/3] overflow-hidden bg-base-200">
                            <?php if (!empty($cert['image'])): ?>
                                <img src="<?= base_url($cert['image']) ?>" alt="Certification" class="object-cover w-full h-full transition-transform duration-300 group-hover:scale-105">
                            <?php else: ?>
                                <div class="flex items-center justify-center w-full h-full text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            <?php endif; ?>

                            <!-- Hover Overlay -->
                            <div class="absolute inset-0 flex items-center justify-center gap-2 transition-opacity duration-300 opacity-0 bg-black/60 group-hover:opacity-100">
                                <button onclick="viewImage('<?= base_url($cert['image']) ?>')" class="btn btn-circle btn-sm bg-white/20 hover:bg-white/30 border-none text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                                <button onclick="openEditModal(<?= htmlspecialchars(json_encode($cert), ENT_QUOTES, 'UTF-8') ?>)" class="btn btn-circle btn-sm bg-pink-500/80 hover:bg-pink-500 border-none text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                <button onclick="confirmDelete(<?= $cert['certification_id'] ?>)" class="btn btn-circle btn-sm bg-red-500/80 hover:bg-red-500 border-none text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Card Footer -->
                        <div class="p-3">
                            <p class="text-xs text-gray-500">Added: <?= date('M d, Y', strtotime($cert['created_at'] ?? 'now')) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-span-full flex flex-col items-center gap-4 py-12">
                    <div class="flex items-center justify-center w-16 h-16 rounded-full bg-pink-500/10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                        </svg>
                    </div>
                    <div class="text-center">
                        <p class="text-gray-300">No certifications yet</p>
                        <p class="text-sm text-gray-500">Click "Add Certification" to upload your certificates</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Add/Edit Certification Modal -->
<dialog id="certModal" class="modal">
    <div class="modal-box !max-w-md">
        <form id="certForm" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="_method" id="formMethod" value="POST">
            <input type="hidden" name="certification_id" id="certId">

            <h3 class="modal-title" id="modalTitle">Add New Certification</h3>

            <fieldset class="fieldset">
                <!-- Current Image Preview (for edit) -->
                <div id="currentImagePreview" class="hidden mb-4">
                    <label class="modal-label">Current Image</label>
                    <div class="relative aspect-[4/3] overflow-hidden rounded-lg bg-base-300">
                        <img id="imagePreview" src="" alt="Current Image" class="object-cover w-full h-full">
                    </div>
                </div>

                <!-- Certification Image -->
                <label class="modal-label" id="imageLabel">Certification Image <span class="text-pink-400 text-xs" id="imageRequired">Required</span></label>
                <input type="file" name="image" id="imageInput" accept="image/*" class="file-input">
                <p class="label text-gray-500">Recommended: High resolution image of your certificate</p>
            </fieldset>

            <div class="modal-action">
                <button type="button" onclick="closeModal()" class="btn btn-secondary">Cancel</button>
                <button type="submit" class="btn btn-primary">
                    <span id="submitBtnText">Upload Certification</span>
                </button>
            </div>
        </form>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

<!-- Image Viewer Modal -->
<dialog id="imageViewerModal" class="modal">
    <div class="modal-box !max-w-4xl p-2">
        <img id="viewerImage" src="" alt="Certification" class="w-full h-auto rounded-lg">
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

<!-- Delete Confirmation Modal -->
<dialog id="deleteModal" class="modal">
    <div class="modal-box !max-w-md">
        <h3 class="modal-title">Confirm Delete</h3>
        <p class="text-gray-300">Are you sure you want to delete this certification?</p>
        <p class="mt-2 text-sm text-gray-500">This action cannot be undone.</p>

        <form id="deleteForm" method="POST">

            <input type="hidden" name="_method" value="POST">

            <div class="modal-action">
                <button type="button" onclick="document.getElementById('deleteModal').close()" class="btn btn-secondary">Cancel</button>
                <button type="submit" class="btn btn-error">Delete</button>
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
    const modal = document.getElementById('certModal');
    const form = document.getElementById('certForm');

    function openAddModal() {
        document.getElementById('modalTitle').textContent = 'Add New Certification';
        document.getElementById('submitBtnText').textContent = 'Upload Certification';
        document.getElementById('formMethod').value = 'POST';
        document.getElementById('imageRequired').textContent = 'Required';
        document.getElementById('imageInput').required = true;
        form.action = '<?= base_url('admin/certifications/store') ?>';
        form.reset();
        document.getElementById('currentImagePreview').classList.add('hidden');
        modal.showModal();
    }

    function openEditModal(cert) {
        document.getElementById('modalTitle').textContent = 'Update Certification';
        document.getElementById('submitBtnText').textContent = 'Update Certification';
        document.getElementById('formMethod').value = 'POST';
        document.getElementById('imageRequired').textContent = 'Optional (keep current)';
        document.getElementById('imageInput').required = false;
        form.action = '<?= base_url('admin/certifications/store') ?>';

        document.getElementById('certId').value = cert.certification_id;

        if (cert.image) {
            document.getElementById('currentImagePreview').classList.remove('hidden');
            document.getElementById('imagePreview').src = '<?= base_url() ?>' + cert.image;
        } else {
            document.getElementById('currentImagePreview').classList.add('hidden');
        }

        modal.showModal();
    }

    function closeModal() {
        modal.close();
    }

    function viewImage(src) {
        document.getElementById('viewerImage').src = src;
        document.getElementById('imageViewerModal').showModal();
    }

    function confirmDelete(id) {
        document.getElementById('deleteForm').action = '<?= base_url('admin/certifications/delete') ?>/' + id;
        document.getElementById('deleteModal').showModal();
    }
</script>
<?php View::endSection() ?>