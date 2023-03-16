<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\ClientProfile;

class History extends Model
{
    use HasFactory;

    public static function newHistory($data)
    {
        $history = new static;
        $history->fill($data);
        if ($history->save()) {
            return $history;
        }
        return false;
    }

    protected $fillable = [
        "action_take",
        "date",
        "employee_id",
        "client_profile_id",
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function clientProfile()
    {
        return $this->belongsTo(ClientProfile::class);
    }
}
