<?php

namespace app\models;

use app\core\Model;

/**
 * Home Model
 * 
 * Manages the home/hero section & character stats data including
 * name, role, short bio, HP %, EXP %, Level text, Weapon text, and profile photo.
 */
class HomeModel extends Model
{
    protected string $table = 'home_tbl';
    protected string $primaryKey = 'id';
    protected array $allowedFields = ['name', 'role', 'short_bio', 'hp_percentage', 'exp_percentage', 'level_text', 'weapon_text', 'profile_photo'];
    protected bool $useTimestamps = true;
}
