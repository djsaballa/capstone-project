<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function district()
    {
        return $this->belongsTo(District::class);
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
