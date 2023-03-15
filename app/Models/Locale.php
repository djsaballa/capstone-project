<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\District;
use App\Models\Division;

class Locale extends Model
{
    use HasFactory;

    public static function newLocale($data)
    {
        $locale = new static;
        $locale->fill($data);
        if ($locale->save()) {
            return $locale;
        }
        return false;
    }

    protected $fillable = [
        "locale",
        "district_id",
        "division_id"
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
    
    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function getId()
    {
        return $this->id;
    }

    public static function getLocaleName($locale_id)
    {
        $locale = Locale::find($locale_id);
        $locale_name = $locale->locale;
        
        return $locale_name;
    }

    public static function getDivisionName($locale_id)
    {
        $locale = Locale::find($locale_id);
        $division_id = $locale->division_id;
        $division = Division::find($division_id);
        $division_name = $division->division;
        
        return $division_name;
    }

    public static function getDistrictName($locale_id)
    {
        $locale = Locale::find($locale_id);
        $district_id = $locale->district_id;
        $district = District::find($district_id);
        $district_name = $district->district;
        
        return $district_name;
    }
}
