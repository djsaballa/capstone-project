<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Locale;
use App\Models\District;

class Division extends Model
{
    use HasFactory;

    public static function newDivision($data)
    {
        $division = new static;
        $division->fill($data);
        if ($division->save()) {
            return $division;
        }
        return false;
    }

    protected $fillable = [
        "division"
    ];
    
    public function locales()
    {
        return $this->hasMany(Locale::class);
    }

    public function districts()
    {
        return $this->hasMany(District::class);
    }

    public function getId()
    {
        return $this->id;
    }

    public static function getDivisionName($division_id)
    {
        $division = Division::find($division_id);
        $division_name = $division->division;
        
        return $division_name;
    }
}
