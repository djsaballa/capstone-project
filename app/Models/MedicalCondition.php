<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\ClientProfile;
use App\Models\Disease;
use App\Models\MedicalCategory;
use App\Models\MedicalOperation;
use Hamcrest\Core\HasToString;

class MedicalCondition extends Model
{
    use HasFactory;

    public static function newMedicalCondition($data)
    {
        $medical_condition = new static;
        $medical_condition->fill($data);
        if ($medical_condition->save()) {
            return $medical_condition;
        }
        return false;
    }

    protected $fillable = [
        "sickness",
        "since_when",
        "medicine_supplement",
        "dosage",
        "frequency",
        "hospital",
        "doctor",
        "client_profile_id",
        "disease_id",
        "medical_category_id"
    ];

    public function clientProfile()
    {
        return $this->belongsTo(ClientProfile::class);
    }

    public function medicalCategory()
    {
        return $this->belongsTo(MedicalCategory::class);
    }

    public function disease()
    {
        return $this->belongsTo(Disease::class);
    }

    public function medicalOperation()
    {
        return $this->hasMany(MedicalOperation::class);
    }

    public function getId()
    {
        return $this->id;
    }

    public function dateFormatMdY($date)
    {
        $formattedDate = Carbon::parse($date)->format("M. d, Y");

        return $formattedDate;
    }

    public function getMedicalOperations($medical_condition_id)
    {
        $medical_operations = MedicalOperation::whereIn('medical_condition_id', $medical_condition_id)->get();

        return $medical_operations;
    }
}
