<?php

namespace app\controllers\Admin;

use app\core\Controller;
use app\models\ServiceModel;

/**
 * Service Controller
 */
class ServiceController extends Controller
{
    protected ServiceModel $model;

    public function __construct()
    {
        $this->model = new ServiceModel();
    }

    public function index(): void
    {
        require_auth();
        $data = [
            'pageTitle' => 'Services',
            'pageDescription' => 'Manage your offered services',
            'activeMenu' => 'services',
            'services' => $this->model->all(),
        ];

        $this->view('admin/services', $data);
    }

    public function store(): void
    {
        require_auth();
        $data = $_POST;
        $isUpdate = !empty($data['service_id']);

        if (!$isUpdate) {
            unset($data['service_id']);
        }

        // Get old icon for deletion
        $oldIcon = null;
        if ($isUpdate) {
            $existing = $this->model->find($data['service_id']);
            $oldIcon = $existing['icon'] ?? null;
        }

        // Upload icon
        $upload = upload_file('icon', 'services', $oldIcon);

        if (!$upload['success']) {
            set_flash('error', $upload['error']);
            $this->redirect('admin/services');
            return;
        }

        if ($upload['path']) {
            $data['icon'] = $upload['path'];
        } else {
            unset($data['icon']);
        }

        if (!$this->model->save($data)) {
            set_flash('error', 'Failed to save service. Please try again.');
            $this->redirect('admin/services');
            return;
        }

        set_flash('success', 'Service saved successfully.');
        $this->redirect('admin/services');
    }

    public function delete(int $id): void
    {
        require_auth();
        $service = $this->model->find($id);

        if (!$service) {
            set_flash('error', 'Service not found.');
            $this->redirect('admin/services');
            return;
        }

        $this->model->delete($id);

        if (!empty($service['icon'])) {
            delete_uploaded_file($service['icon']);
        }

        set_flash('success', 'Service deleted successfully.');
        $this->redirect('admin/services');
    }
}
