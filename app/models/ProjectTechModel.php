<?php

namespace app\models;

use app\core\Model;

/**
 * Project Tech Model
 * 
 * Manages the many-to-many relationship between
 * projects and technologies (pivot table).
 */
class ProjectTechModel extends Model
{
    protected string $table = 'project_technologies_tbl';
    protected string $primaryKey = 'id';
    protected array $allowedFields = ['project_id', 'tech_id'];
    protected bool $useTimestamps = false;
    protected string $createdField = 'created_at';

    /**
     * Sync technologies for a project
     * Removes existing and adds new associations
     * 
     * @param int $projectId
     * @param array $techIds
     * @return bool
     */
    public function syncTechnologies(int $projectId, array $techIds): bool
    {
        // First, delete existing associations
        $sql = "DELETE FROM {$this->table} WHERE project_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$projectId]);

        // Insert new associations
        foreach ($techIds as $techId) {
            $this->insert([
                'project_id' => $projectId,
                'tech_id' => $techId,
            ]);
        }

        return true;
    }

    /**
     * Get all tech IDs for a project
     * 
     * @param int $projectId
     * @return array
     */
    public function getTechIdsForProject(int $projectId): array
    {
        $results = $this->where('project_id', $projectId)->all();
        return array_column($results, 'tech_id');
    }

    /**
     * Delete all associations for a project
     * 
     * @param int $projectId
     * @return bool
     */
    public function deleteByProject(int $projectId): bool
    {
        $sql = "DELETE FROM {$this->table} WHERE project_id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$projectId]);
    }
}
