<?php

namespace App\Models;

use Alexmg86\LaravelSubQuery\Traits\LaravelSubQueryTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    use HasFactory,LaravelSubQueryTrait;
    public $fillable=[

        'from_id',
        'from_type',
        'to_type',
        'to_id',
        'isblocked'
    ];




    function from(){

        return $this->morphTo();
    }



    function to(){
        return $this->morphTo();
    }







    public function name()
    {

        if ($this->to_id==auth()->user()->id)
            $nae=User::find($this->from_id)->name;
        else
            $nae=User::find($this->to_id)->name;


        # code...
    }



    public function messages(){
        return $this->hasMany(Message::class);
    }



    public function unread_messages(){
        return $this->hasMany(Message::class)->where("is_readed","=","0")->orderBy("id","desc");
    }
}
