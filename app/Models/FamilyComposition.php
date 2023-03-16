<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ClientProfile;

class FamilyComposition extends Model
{
    use HasFactory;

    public static function newFamilyComposition($data)
    {
        $family_composition = new static;
        $family_composition->fill($data);
        if ($family_composition->save()) {
            return $family_composition;
        }
        return false;
    }

    protected $fillable = [
        "first_name",
        "middle_name",
        "last_name",
        "relationship",
        "educational_attainment",
        "occupation",
        "contact_number",
        "client_profile_if",
    ];

    public function clientProfile()
    {
        return $this->belongsTo(ClientProfile::class);
    }

    public static function getFullName($family_composition_id)
    {
        $family_composition = ClientProfile::find($family_composition_id);
        $firstName = $family_composition->first_name;
        $middleName = $family_composition->middle_name;
        $lastName = $family_composition->last_name;

        return $firstName . " " . $middleName . " " . $lastName;
    }
}
