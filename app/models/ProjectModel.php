<?php

namespace app\models;

use app\core\Model;

/**
 * Project Model
 * 
 * Manages portfolio projects including their details,
 * images, and links. Includes method to fetch projects
 * with associated technologies.
 */
class ProjectModel extends Model
{
    protected string $table = 'projects_tbl';
    protected string $primaryKey = 'project_id';
    protected array $allowedFields = ['project_name', 'description', 'long_description', 'challenges', 'key_features', 'role', 'image', 'preview_link', 'project_link', 'start_date', 'end_date'];
    protected bool $useTimestamps = true;

    /**
     * Get all projects with their associated technologies
     * 
     * Fetches all project tech in one query and groups it by project,
     * avoiding an N+1 query per project.
     * 
     * @return array
     */
    public function getProjectsWithTech(): array
    {
        $projects = $this->all();

        if (empty($projects)) {
            return [];
        }

        $ids = array_column($projects, 'project_id');
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $sql = "SELECT pt.project_id, t.tech_id, t.tech_name, t.icon
                FROM project_technologies_tbl pt
                INNER JOIN techstack_tbl t ON t.tech_id = pt.tech_id
                WHERE pt.project_id IN ($placeholders)
                ORDER BY pt.project_id, t.tech_name";

        $techByProject = [];
        foreach ($this->query($sql, $ids) as $row) {
            $projectId = $row['project_id'];
            unset($row['project_id']);
            $techByProject[$projectId][] = $row;
        }

        foreach ($projects as &$project) {
            $project['technologies'] = $techByProject[$project['project_id']] ?? [];
        }
        unset($project);

        return $projects;
    }

    /**
     * Get a single project by ID with its associated technologies
     * 
     * @param int $id Project ID
     * @return array|null
     */
    public function getProjectById(int $id): ?array
    {
        $project = $this->find($id);

        if (empty($project)) {
            return null;
        }

        $sql = "SELECT t.tech_id, t.tech_name, t.icon, t.category
                FROM project_technologies_tbl pt 
                INNER JOIN techstack_tbl t ON t.tech_id = pt.tech_id 
                WHERE pt.project_id = ?";

        $project['technologies'] = $this->query($sql, [$project['project_id']]);

        // Decode JSON fields
        $project['challenges'] = json_decode($project['challenges'] ?? '[]', true) ?: [];
        $project['key_features'] = json_decode($project['key_features'] ?? '[]', true) ?: [];

        return $project;
    }
}
