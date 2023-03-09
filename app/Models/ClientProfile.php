<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FamilyComposition;
use App\Models\MedicalCondition;
use App\Models\ProgressReport;
use App\Models\History;
use App\Models\Employee;
use App\Models\Locale;

class ClientProfile extends Model
{
    use HasFactory;

    public static function newClientProfile($data)
    {
        $client_profile = new static;
        $client_profile->fill($data);
        if ($client_profile->save()) {
            return $client_profile;
        }
        return false;
    }

    protected $fillable = [
        "picture",
        "first_name",
        "middle_name",
        "last_name",
        "address",
        "gender",
        "age",
        "birthdate",
        "occupation",
        "height",
        "baptism_date",
        "contact_person1_name",
        "contact_person1_contact_number",
        "contact_person2_name",
        "contact_person2_contact_number",
        "background_info",
        "background_info_attachment",
        "action_take",
        "action_take_attachement",
        "locale_servant_remark",
        "district_servant_remark",
        "division_servant_remark",
        "social_worker_recommendation",
        "status",
        "employee_encoder_id",
        "locale_id"
    ];

    public function familyCompositions()
    {
        return $this->hasMany(FamilyComposition::class);
    }

    public function medicalConditions()
    {
        return $this->hasMany(MedicalCondition::class);
    }

    public function progressReports()
    {
        return $this->hasMany(ProgressReport::class);
    }

    public function histories()
    {
        return $this->hasMany(History::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function locale()
    {
        return $this->belongsTo(Locale::class);
    }
}
