<?php

namespace app\controllers;

use app\models\ProjectModel;

/**
 * Sitemap Controller
 * Outputs raw XML sitemap for search engine crawlers
 */
class SitemapController
{
    public function index()
    {
        if (ob_get_length()) ob_clean();
        header('Content-Type: application/xml; charset=utf-8');

        $baseUrl = base_url();
        $projectModel = new ProjectModel();
        $projects = $projectModel->all() ?? [];

        echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        // Homepage
        echo '  <url>' . "\n";
        echo '    <loc>' . htmlspecialchars($baseUrl) . '</loc>' . "\n";
        echo '    <lastmod>' . date('Y-m-d') . '</lastmod>' . "\n";
        echo '    <changefreq>weekly</changefreq>' . "\n";
        echo '    <priority>1.0</priority>' . "\n";
        echo '  </url>' . "\n";

        // Project Detail pages
        foreach ($projects as $project) {
            if (!empty($project['project_id']) && !empty($project['project_name']) && strtolower($project['project_name']) !== 'test') {
                $lastMod = !empty($project['updated_at']) ? date('Y-m-d', strtotime($project['updated_at'])) : date('Y-m-d');
                echo '  <url>' . "\n";
                echo '    <loc>' . htmlspecialchars($baseUrl . 'project/' . $project['project_id']) . '</loc>' . "\n";
                echo '    <lastmod>' . $lastMod . '</lastmod>' . "\n";
                echo '    <changefreq>monthly</changefreq>' . "\n";
                echo '    <priority>0.8</priority>' . "\n";
                echo '  </url>' . "\n";
            }
        }

        echo '</urlset>';
        exit;
    }
}
