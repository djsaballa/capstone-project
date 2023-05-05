<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ClientProfile;
use Carbon\Carbon;

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
        "client_profile_id",
    ];

    public function clientProfile()
    {
        return $this->belongsTo(ClientProfile::class);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getMedicalOperations($medical_condition_id)
    {
        $operations = MedicalOperation::where('medical_condition_id', '=', $medical_condition_id);

        return $operations;
    }

    public function dateFormatMdY($date)
    {
        $formattedDate = Carbon::parse($date)->format("M. d, Y");

        return $formattedDate;
    }
}
