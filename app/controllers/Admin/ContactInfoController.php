<?php

namespace app\controllers\Admin;

use app\core\Controller;
use app\models\ContactInfoModel;

/**
 * Contact Info Controller
 */
class ContactInfoController extends Controller
{
    protected ContactInfoModel $model;

    public function __construct()
    {
        $this->model = new ContactInfoModel();
    }

    public function index(): void
    {
        $data = [
            'pageTitle' => 'Contact Information',
            'pageDescription' => 'Manage your contact details and social links',
            'activeMenu' => 'contacts',
            'contact' => $this->model->first() ?? [],
        ];

        $this->view('admin/contacts', $data);
    }

    public function store(): void
    {
        $data = $_POST;
        $isUpdate = !empty($data['contact_id']);

        if (!$isUpdate) {
            unset($data['contact_id']);
        }

        if (!$this->model->save($data)) {
            set_flash('error', 'Failed to save contact information. Please try again.');
            $this->redirect('admin/contacts');
            return;
        }

        set_flash('success', 'Contact information saved successfully.');
        $this->redirect('admin/contacts');
    }
}
