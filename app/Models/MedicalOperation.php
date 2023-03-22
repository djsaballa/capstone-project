<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MedicalCondition;

class MedicalOperation extends Model
{
    use HasFactory;

    public static function newMedicalOperation($data)
    {
        $medical_operation = new static;
        $medical_operation->fill($data);
        if ($medical_operation->save()) {
            return $medical_operation;
        }
        return false;
    }

    protected $fillable = [
        "operation",
        "date",
        "medical_condition_id",
    ];

    public function medicalCondition()
    {
        return $this->belongsTo(MedicalCondition::class);
    }

    public function getMedicalOperations($medical_condition_id)
    {
        $operations = MedicalOperation::where('medical_condition_id', '=', $medical_condition_id);

        return $operations;
    }
}
