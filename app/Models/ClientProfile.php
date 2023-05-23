<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FamilyComposition;
use App\Models\MedicalCondition;
use App\Models\MedicalCategory;
use App\Models\ProgressReport;
use App\Models\History;
use App\Models\User;
use App\Models\Locale;
use Carbon\Carbon;

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
        "privacy_consent",
        "first_name",
        "middle_name",
        "last_name",
        "address",
        "gender",
        "contact_number",
        "age",
        "birth_date",
        "occupation",
        "height",
        "weight",
        "baptism_date",
        "philhealth_member",
        "health_card",
        "contact_person1_name",
        "contact_person1_contact_number",
        "contact_person2_name",
        "contact_person2_contact_number",
        "background_info",
        "background_info_attachment",
        "action_taken",
        "action_taken_attachment",
        "locale_servant_remark",
        "district_servant_remark",
        "division_servant_remark",
        "social_worker_recommendation",
        "status",
        "user_encoder_id",
        "locale_id",
        "assigned_doctor_id",
        "medical_category_id"
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function locale()
    {
        return $this->belongsTo(Locale::class);
    }

    public function medicalCategory()
    {
        return $this->belongsTo(MedicalCategory::class);
    }

    public function getId()
    {
        return $this->id;
    }

    public static function getFullName($client_profile_id)
    {
        $client_profile = ClientProfile::find($client_profile_id);
        $firstName = $client_profile->first_name;
        $middleName = $client_profile->middle_name;
        $lastName = $client_profile->last_name;

        return $firstName . " " . $middleName . " " . $lastName;
    }

    public function getLocale($client_profile_id)
    {
        $client_profile = ClientProfile::find($client_profile_id);
        $locale_id = $client_profile->locale_id;
        $locale_info = Locale::find($locale_id);
        $locale = $locale_info->locale;

        return $locale;
    }
    
    public static function getAssignedDoctorInfo($assigned_doctor_id)
    {
        $assigned_doctor_info = User::find($assigned_doctor_id);
        
        return $assigned_doctor_info;
    }

    public function getMedicalCategoryName($medical_category_id)
    {
        $medical_category = MedicalCategory::find($medical_category_id);
        $medical_category_name = $medical_category->medical_category;

        return $medical_category_name;
    }

    public function dateFormatMdY($date)
    {
        $formattedDate = Carbon::parse($date)->format("M. d, Y");

        return $formattedDate;
    }
}
