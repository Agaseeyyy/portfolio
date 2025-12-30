<?php

namespace app\controllers\Admin;

use app\core\Controller;
use app\core\Config;
use app\models\HomeModel;

/**
 * Home Controller - Manage hero section
 */
class HomeController extends Controller
{
    protected HomeModel $model;

    public function __construct()
    {
        $this->model = new HomeModel();
    }

    public function index(): void
    {
        require_auth();
        $homeData = $this->model->first() ?? [];

        $data = [
            'pageTitle' => 'Home Section',
            'pageDescription' => "Manage your portfolio's hero section content",
            'activeMenu' => 'home',
            'data' => $homeData,
            'photoSrc' => !empty($homeData['profile_photo']) ? $homeData['profile_photo'] : Config::get('DEFAULT_AVATAR', 'images/def-avatar.png'),
        ];

        $this->view('admin/home', $data);
    }

    public function store(): void
    {
        require_auth();
        $data = $_POST;
        $isUpdate = !empty($data['id']);

        if (!$isUpdate) {
            unset($data['id']);
        }

        // Get old profile photo for deletion
        $oldPhoto = null;
        if ($isUpdate) {
            $existing = $this->model->first();
            $oldPhoto = $existing['profile_photo'] ?? null;
        }

        // Upload profile photo
        $upload = upload_file('profile_photo', 'profile', $oldPhoto);

        if (!$upload['success']) {
            set_flash('error', $upload['error']);
            $this->redirect('admin/home');
            return;
        }

        if ($upload['path']) {
            $data['profile_photo'] = $upload['path'];
        } else {
            unset($data['profile_photo']);
        }

        $this->model->save($data);
        set_flash('success', 'Home section updated successfully.');
        $this->redirect('admin/home');
    }
}
