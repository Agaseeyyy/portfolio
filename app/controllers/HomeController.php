<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Config;
use app\models\HomeModel;
use app\models\ContactInfoModel;
use app\models\ProjectModel;
use app\models\TechstackModel;
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
		$certModel = new CertificationModel();

		$home = $homeModel->first() ?? [];
		$contact = $contactModel->first() ?? [];
		$techstack = $techModel->all() ?? [];

		// Process name parts for nav
		$fullName = $home['name'] ?? 'Agassi Bustarga';
		$nameParts = explode(' ', $fullName, 2);

		// Group techstack by category
		$techCategories = [
			'frontend' => ['label' => 'Frontend', 'items' => []],
			'backend' => ['label' => 'Backend', 'items' => []],
			'database' => ['label' => 'Database', 'items' => []],
			'tools' => ['label' => 'Tools & Others', 'items' => []],
		];
		foreach ($techstack as $tech) {
			$cat = $tech['category'] ?? 'tools';
			if (isset($techCategories[$cat])) {
				$techCategories[$cat]['items'][] = $tech;
			}
		}

		$data = [
			'home' => $home,
			'contact' => $contact,
			'projects' => $projectModel->getProjectsWithTech(),
			'techstack' => $techstack,
			'techCategories' => $techCategories,
			'certifications' => $certModel->all(),
			// Processed values for views
			'firstName' => $nameParts[0] ?? '',
			'lastName' => $nameParts[1] ?? '',
			'profilePhoto' => !empty($home['profile_photo']) ? $home['profile_photo'] : Config::get('DEFAULT_AVATAR', 'images/def-avatar.png'),
			'hoverPhoto' => Config::get('HOVER_AVATAR', 'images/hover-avatar.png'),
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
