<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\ClientProfile;
use GuzzleHttp\Client;

class ProgressReport extends Model
{
    use HasFactory;

    public static function newProgressReport($data)
    {
        $progress_report = new static;
        $progress_report->fill($data);
        if ($progress_report->save()) {
            return $progress_report;
        }
        return false;
    }

    protected $fillable = [
        "date_time",
        "assignee_id",
        "assignee_contact_number",
        "case_note",
        "remark",
        "attachment",
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
