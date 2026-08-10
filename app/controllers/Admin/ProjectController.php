<?php

namespace app\controllers\Admin;

use app\core\Controller;
use app\models\ProjectModel;
use app\models\ProjectTechModel;
use app\models\TechstackModel;

/**
 * Project Controller
 */
class ProjectController extends Controller
{
    protected ProjectModel $model;
    protected ProjectTechModel $projectTechModel;

    public function __construct()
    {
        $this->model = new ProjectModel();
        $this->projectTechModel = new ProjectTechModel();
    }

    public function index(): void
    {
        require_auth();
        $data = [
            'pageTitle' => 'Projects',
            'pageDescription' => 'Manage your portfolio projects',
            'activeMenu' => 'projects',
            'projects' => $this->model->getProjectsWithTech(),
            'techstack' => (new TechstackModel())->all(),
        ];

        $this->view('admin/projects', $data);
    }

    public function store(): void
    {
        require_auth();
        if (!verify_csrf()) {
            set_flash('error', 'Invalid or expired security token. Please try again.');
            $this->redirect('admin/projects');
            return;
        }

        $data = $_POST;
        $technologies = $data['technologies'] ?? [];
        unset($data['technologies']);

        // Convert empty end_date to null (MySQL requires valid date or NULL)
        if (empty($data['end_date'])) {
            $data['end_date'] = null;
        }

        // Convert key_features and challenges from newline-separated to JSON
        if (!empty($data['key_features'])) {
            $features = array_filter(array_map('trim', explode("\n", $data['key_features'])));
            $data['key_features'] = json_encode(array_values($features));
        } else {
            $data['key_features'] = json_encode([]);
        }

        if (!empty($data['challenges'])) {
            $challenges = array_filter(array_map('trim', explode("\n", $data['challenges'])));
            $data['challenges'] = json_encode(array_values($challenges));
        } else {
            $data['challenges'] = json_encode([]);
        }

        $isUpdate = !empty($data['project_id']);

        if (!$isUpdate) {
            unset($data['project_id']);
        }

        // Get old image for deletion
        $oldImage = null;
        if ($isUpdate) {
            $existing = $this->model->find($data['project_id']);
            $oldImage = $existing['image'] ?? null;
        }

        // Upload image
        $upload = upload_file('image', 'projects', $oldImage);

        if (!$upload['success']) {
            set_flash('error', $upload['error']);
            $this->redirect('admin/projects');
            return;
        }

        if ($upload['path']) {
            $data['image'] = $upload['path'];
        } else {
            unset($data['image']);
        }

        // Save project
        $result = $this->model->save($data);
        if ($result === false) {
            set_flash('error', 'Failed to save project. Please try again.');
            $this->redirect('admin/projects');
            return;
        }
        $projectId = $isUpdate ? $data['project_id'] : $result;

        // Sync technologies
        $this->projectTechModel->syncTechnologies($projectId, $technologies);

        set_flash('success', 'Project saved successfully.');
        $this->redirect('admin/projects');
    }

    public function delete(int $id): void
    {
        require_auth();
        if (!verify_csrf()) {
            set_flash('error', 'Invalid or expired security token. Please try again.');
            $this->redirect('admin/projects');
            return;
        }

        $project = $this->model->find($id);

        if (!$project) {
            set_flash('error', 'Project not found.');
            $this->redirect('admin/projects');
            return;
        }

        // Delete junction entries first
        $this->projectTechModel->deleteByProject($id);

        // Delete project
        $this->model->delete($id);

        // Delete image file
        if (!empty($project['image'])) {
            delete_uploaded_file($project['image']);
        }

        set_flash('success', 'Project deleted successfully.');
        $this->redirect('admin/projects');
    }
}
