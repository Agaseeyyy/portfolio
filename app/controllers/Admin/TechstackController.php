<?php
namespace app\controllers\Admin;

use app\core\Controller;
use app\models\TechstackModel;

/**
 * Techstack Controller
 */
class TechstackController extends Controller
{
    protected TechstackModel $model;

    public function __construct()
    {
        $this->model = new TechstackModel();
    }

    public function index(): void
    {
        $data = [
            'pageTitle' => 'Tech Stack',
            'pageDescription' => 'Manage your technology stack',
            'activeMenu' => 'techstack',
            'techstack' => $this->model->all(),
        ];

        $this->view('admin/techstack', $data);
    }

    public function store(): void
    {
        $data = $_POST;
        $isUpdate = !empty($data['tech_id']);
        
        if (!$isUpdate) {
            unset($data['tech_id']);
        }

        // Get old icon for deletion
        $oldIcon = null;
        if ($isUpdate) {
            $existing = $this->model->find($data['tech_id']);
            $oldIcon = $existing['icon'] ?? null;
        }

        // Upload icon
        $upload = upload_file('icon', 'techstack', $oldIcon);

        if (!$upload['success']) {
            set_flash('error', $upload['error']);
            $this->redirect('admin/techstack');
            return;
        }

        if ($upload['path']) {
            $data['icon'] = $upload['path'];
        } else {
            unset($data['icon']);
        }

        if(!$this->model->save($data)) {
            set_flash('error', 'Failed to save technology. Please try again.');
            $this->redirect('admin/techstack');
            return;
        }

        set_flash('success', 'Technology saved successfully.');
        $this->redirect('admin/techstack');
    }

    public function delete(int $id): void
    {
        $tech = $this->model->find($id);

        if (!$tech) {
            set_flash('error', 'Technology not found.');
            $this->redirect('admin/techstack');
            return;
        }

        $this->model->delete($id);

        if (!empty($tech['icon'])) {
            delete_uploaded_file($tech['icon']);
        }

        set_flash('success', 'Technology deleted successfully.');
        $this->redirect('admin/techstack');
    }
}
