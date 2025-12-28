<?php
namespace app\models;

use app\core\Model;

/**
 * Contact Info Model
 * 
 * Manages contact information including email,
 * address, and social media links.
 */
class ContactInfoModel extends Model
{
    protected string $table = 'contact_info_tbl';
    protected string $primaryKey = 'contact_id';
    protected array $allowedFields = ['email', 'address', 'github_link', 'linkedin_link', 'instagram_link'];
    protected bool $useTimestamps = false;
}
