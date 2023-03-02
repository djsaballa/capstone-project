<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function division()
    {
        return $this->belongsTo(Division::class);
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
