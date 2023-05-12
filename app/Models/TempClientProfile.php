<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FamilyComposition;
use App\Models\MedicalCondition;
use App\Models\ProgressReport;
use App\Models\History;
use App\Models\User;
use App\Models\Locale;
use Carbon\Carbon;

class TempClientProfile extends Model
{
    use HasFactory;

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
        "height",
        "weight",
        "occupation",
        "division",
        "district",
        "locale",
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
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function locale()
    {
        return $this->belongsTo(Locale::class);
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

    public function dateFormatMdY($date)
    {
        $formattedDate = Carbon::parse($date)->format("M. d, Y");

        return $formattedDate;
    }
}
