<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Carbon\Carbon;

class Inbox extends Model
{
    use HasFactory;

    public static function newInbox($data)
    {
        $inbox = new static;
        $inbox->fill($data);
        if ($inbox->save()) {
            return $inbox;
        }
        return false;
    }

    protected $fillable = [
        "content",
        "date_sent",
        "sender_user_id",
        "receiver_user_id",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getSenderName($sender_employee_id)
    {
        $sender_info = User::find($sender_employee_id);
        $firstName = $sender_info->first_name;
        $middleName = $sender_info->middle_name;
        $lastName = $sender_info->last_name;

        return $firstName . " " . $middleName . " " . $lastName;
    }

    public function getSenderPicture($sender_employee_id)
    {
        $sender_info = User::find($sender_employee_id);
        $sender_picture = $sender_info->picture;
        
        return $sender_picture;
    }

    public function dateFormatMdY($date)
    {
        $formattedDate = Carbon::parse($date)->format("M. d, Y");

        return $formattedDate;
    }
}
