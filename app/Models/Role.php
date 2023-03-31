<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\SecurityLevel;

class Role extends Model
{
    use HasFactory;

    public static function newRole($data)
    {
        $role = new static;
        $role->fill($data);
        if ($role->save()) {
            return $role;
        }
        return false;
    }

    protected $fillable = [
        "role",
        "security_level_id"
    ];

    public function securityLevel()
    {
        return $this->belongsTo(SecurityLevel::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function getId()
    {
        return $this->id;
    }

    public static function getRoleName($role_id)
    {
        $role = Role::find($role_id);
        $role_name = $role->role;

        return $role_name;
    }

    public static function getSecurityLevel($role_id)
    {
        $role = Role::find($role_id);
        $security_level_id = $role->security_level_id;
        $security_level = SecurityLevel::getSecurityLevel($security_level_id);

        return $security_level;
    }
}
