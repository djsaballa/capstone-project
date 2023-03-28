<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MedicalCondition;

class MedicalCategory extends Model
{
    use HasFactory;

    public static function newMedicalCategory($data)
    {
        $medical_category = new static;
        $medical_category->fill($data);
        if ($medical_category->save()) {
            return $medical_category;
        }
        return false;
    }

    protected $fillable = [
        "medical_category",
        "priority_level"
    ];

    public function medicalConditions()
    {
        return $this->hasMany(MedicalCondition::class);
    }

    public function getId()
    {
        return $this->id;
    }
}
