<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecurityLevel extends Model
{
    use HasFactory;

    public static function newSecurityLevel($data)
    {
        $security_level = new static;
        $security_level->fill($data);
        if ($security_level->save()) {
            return $security_level;
        }
        return false;
    }

    protected $fillable = [
        "security_level"
    ];

    public function securityLevel()
    {
        return $this->belongsTo(SecurityLevel::class);
    }

    public function getId()
    {
        return $this->id;
    }

    public static function getSecurityLevel($security_level_id)
    {
        $security_level = SecurityLevel::find($security_level_id);

        return $security_level->security_level;
    }
}