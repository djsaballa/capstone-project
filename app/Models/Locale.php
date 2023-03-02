<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function locale()
    {
        return $this->belongsTo(Locale::class);
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
}
