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
        "name",
        "relationship",
        "educational_attainment",
        "occupation",
        "contact_number",
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
}
