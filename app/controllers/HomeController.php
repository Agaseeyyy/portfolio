<?php 
namespace app\controllers;

use app\core\Controller;
use app\models\HomeModel;
use app\models\ContactInfoModel;
use app\models\ProjectModel;
use app\models\TechstackModel;
use app\models\ServiceModel;
use app\models\CertificationModel;

/**
 * Public Home Controller
 * 
 * Fetches all data needed for the public portfolio page
 */
class HomeController extends Controller
{
	public function index()
	{
		// Fetch all data from models
		$homeModel = new HomeModel();
		$contactModel = new ContactInfoModel();
		$projectModel = new ProjectModel();
		$techModel = new TechstackModel();
		$serviceModel = new ServiceModel();
		$certModel = new CertificationModel();

		$data = [
			'home' => $homeModel->first(),
			'contact' => $contactModel->first(),
			'projects' => $projectModel->getProjectsWithTech(),
			'techstack' => $techModel->all(),
			'services' => $serviceModel->all(),
			'certifications' => $certModel->all(),
		];

		return $this->view('/public/home', $data);
	}

	/**
	 * Display a single project's detail page
	 * 
	 * @param int $id Project ID
	 */
	public function projectDetail(int $id)
	{
		$projectModel = new ProjectModel();
		$homeModel = new HomeModel();
		$contactModel = new ContactInfoModel();

		$project = $projectModel->getProjectById($id);

		if (!$project) {
			$this->redirect('/');
			return;
		}

		// Calculate duration and date range
		$duration = '';
		$dateRange = '';
		
		if ($startDate = $project['start_date'] ?? '') {
			$start = new \DateTime($startDate);
			$end = new \DateTime($project['end_date'] ?: 'now');
			$diff = $start->diff($end);
			
			// Build duration string from non-zero parts
			$parts = [];
			if ($diff->y) $parts[] = $diff->y . ' year' . ($diff->y > 1 ? 's' : '');
			if ($diff->m) $parts[] = $diff->m . ' month' . ($diff->m > 1 ? 's' : '');
			if (empty($parts) && $diff->d) $parts[] = $diff->d . ' day' . ($diff->d > 1 ? 's' : '');
			$duration = implode(', ', $parts);

			// Format date range
			$dateRange = date('M Y', strtotime($startDate)) . ' - ' . 
			             ($project['end_date'] ? date('M Y', strtotime($project['end_date'])) : 'Present');
		}

		$data = [
			'project' => $project,
			'duration' => $duration,
			'dateRange' => $dateRange,
			'home' => $homeModel->first(),
			'contact' => $contactModel->first(),
		];

		return $this->view('/public/project-detail', $data);
	}
}