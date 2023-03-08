<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MedicalCondition;

class Disease extends Model
{
    use HasFactory;

    public static function newDisease($data)
    {
        $disease = new static;
        $disease->fill($data);
        if ($disease->save()) {
            return $disease;
        }
        return false;
    }

    protected $fillable = [
        "disease"
    ];

    public function medicalConditions()
    {
        return $this->hasMany(MedicalCondition::class);
    }
}
