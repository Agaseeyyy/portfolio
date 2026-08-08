<?php

namespace app\models;

use app\core\Model;

/**
 * Techstack Model
 * 
 * Manages technology stack items including
 * tech name, icon, category, and proficiency score (1-10).
 */
class TechstackModel extends Model
{
    protected string $table = 'techstack_tbl';
    protected string $primaryKey = 'tech_id';
    protected array $allowedFields = ['tech_name', 'icon', 'category', 'proficiency'];
    protected bool $useTimestamps = true;

    /**
     * Get technologies grouped by category
     * 
     * @return array
     */
    public function getByCategory(): array
    {
        $all = $this->all();
        $grouped = [
            'frontend' => [],
            'backend' => [],
            'database' => [],
            'tools' => [],
        ];

        foreach ($all as $tech) {
            $category = $tech['category'] ?? 'tools';
            if (isset($grouped[$category])) {
                $grouped[$category][] = $tech;
            }
        }

        return $grouped;
    }
}
