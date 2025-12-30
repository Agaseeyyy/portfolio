<?php

namespace app\controllers\Admin;

use app\core\Controller;
use app\models\CertificationModel;

/**
 * Certification Controller
 */
class CertificationController extends Controller
{
    protected CertificationModel $model;

    public function __construct()
    {
        $this->model = new CertificationModel();
    }

    public function index(): void
    {
        require_auth();
        $data = [
            'pageTitle' => 'Certifications',
            'pageDescription' => 'Manage your certification images',
            'activeMenu' => 'certifications',
            'certifications' => $this->model->all(),
        ];

        $this->view('admin/certifications', $data);
    }

    public function store(): void
    {
        require_auth();
        $data = $_POST;
        $isUpdate = !empty($data['certification_id']);

        if (!$isUpdate) {
            unset($data['certification_id']);
        }

        // Get old image for deletion
        $oldImage = null;
        if ($isUpdate) {
            $existing = $this->model->find($data['certification_id']);
            $oldImage = $existing['image'] ?? null;
        }

        // Upload image
        $upload = upload_file('image', 'certifications', $oldImage);

        if (!$upload['success']) {
            set_flash('error', $upload['error']);
            $this->redirect('admin/certifications');
            return;
        }

        if ($upload['path']) {
            $data['image'] = $upload['path'];
        } elseif (!$isUpdate) {
            // New certification requires an image
            set_flash('error', 'Image is required.');
            $this->redirect('admin/certifications');
            return;
        } else {
            unset($data['image']);
        }

        if (!$this->model->save($data)) {
            set_flash('error', 'Failed to save certification. Please try again.');
            $this->redirect('admin/certifications');
            return;
        }
        set_flash('success', 'Certification saved successfully.');
        $this->redirect('admin/certifications');
    }

    public function delete(int $id): void
    {
        require_auth();
        $cert = $this->model->find($id);

        if (!$cert) {
            set_flash('error', 'Certification not found.');
            $this->redirect('admin/certifications');
            return;
        }

        $this->model->delete($id);

        if (!empty($cert['image'])) {
            delete_uploaded_file($cert['image']);
        }

        set_flash('success', 'Certification deleted successfully.');
        $this->redirect('admin/certifications');
    }
}
