<?php

namespace app\controllers\Admin;

use app\core\Controller;
use app\models\HomeModel;
use app\models\ContactInfoModel;
use app\models\ProjectModel;
use app\models\TechstackModel;
use app\models\ServiceModel;
use app\models\CertificationModel;

/**
 * Dashboard Controller
 */
class DashboardController extends Controller
{
    public function index(): void
    {
        require_auth();
        $data = [
            'pageTitle' => 'Dashboard',
            'pageDescription' => 'Overview of your portfolio content',
            'activeMenu' => 'dashboard',
            'projectCount' => (new ProjectModel())->countAll(),
            'techCount' => (new TechstackModel())->countAll(),
            'serviceCount' => (new ServiceModel())->countAll(),
            'certCount' => (new CertificationModel())->countAll(),
        ];

        $this->view('admin/dashboard', $data);
    }
}
