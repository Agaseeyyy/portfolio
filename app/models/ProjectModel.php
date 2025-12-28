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
     * @return array
     */
    public function getProjectsWithTech(): array
    {
        $projects = $this->all();

        if (empty($projects)) {
            return [];
        }

        foreach ($projects as &$project) {
            $sql = "SELECT t.tech_id, t.tech_name, t.icon 
                    FROM project_technologies_tbl pt 
                    INNER JOIN techstack_tbl t ON t.tech_id = pt.tech_id 
                    WHERE pt.project_id = ?";
            
            $project['technologies'] = $this->query($sql, [$project['project_id']]);
        }

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
