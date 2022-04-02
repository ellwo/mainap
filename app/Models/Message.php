<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public $fillable=[
        'sender','type_message',
        'is_readed',
        'chat_room_id',
        'content'

    ];

    function chatroom(){
        return $this->belongsTo(ChatRoom::class);
    }

    function mdate(){


      //  Carbon::parse(Date::now())->eq($this->created_at);
        return Carbon::parse($this->created_at)->format('d M Y'); // grouping by months

    }
}
