<?php
namespace app\models;

use app\core\Model;

/**
 * Certification Model
 * 
 * Manages certification images.
 */
class CertificationModel extends Model
{
    protected string $table = 'certifications_tbl';
    protected string $primaryKey = 'certification_id';
    protected array $allowedFields = ['image'];
    protected bool $useTimestamps = true;
}
