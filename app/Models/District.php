<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Division;

class District extends Model
{
    use HasFactory;

    public static function newDistrict($data)
    {
        $district = new static;
        $district->fill($data);
        if ($district->save()) {
            return $district;
        }
        return false;
    }

    protected $fillable = [
        "district",
        "division_id"
    ];

    public function locales()
    {
        return $this->hasMany(Locale::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function getId()
    {
        return $this->id;
    }

    public static function getDistrictName($district_id)
    {
        $district = District::find($district_id);
        $district_name = $district->district;
        
        return $district_name;
    }
}
