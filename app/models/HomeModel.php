<?php
namespace app\models;

use app\core\Model;

/**
 * Home Model
 * 
 * Manages the home/hero section data including
 * name, role, short bio, and profile photo.
 */
class HomeModel extends Model
{
    protected string $table = 'home_tbl';
    protected string $primaryKey = 'id';
    protected array $allowedFields = ['name', 'role', 'short_bio', 'profile_photo'];
    protected bool $useTimestamps = true;
}
