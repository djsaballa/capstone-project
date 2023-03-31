<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

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
        "checked",
        "content",
        "date_sent",
        "sender_user_id",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getId()
    {
        return $this->id;
    }
}
