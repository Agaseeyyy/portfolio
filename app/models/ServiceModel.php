<?php
namespace app\models;

use app\core\Model;

/**
 * Service Model
 * 
 * Manages services/offerings including
 * icon, title, and JSON description.
 */
class ServiceModel extends Model
{
    protected string $table = 'services_tbl';
    protected string $primaryKey = 'service_id';
    protected array $allowedFields = ['icon', 'title', 'description_json'];
    protected bool $useTimestamps = true;

    /**
     * Get services with parsed description
     * 
     * @return array
     */
    public function getServicesWithParsedDescription(): array
    {
        $services = $this->all();

        foreach ($services as &$service) {
            if (!empty($service['description_json'])) {
                $service['description_items'] = json_decode($service['description_json'], true) ?? [];
            } else {
                $service['description_items'] = [];
            }
        }

        return $services;
    }
}
