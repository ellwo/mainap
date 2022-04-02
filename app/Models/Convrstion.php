<?php

namespace App\Models;

use Alexmg86\LaravelSubQuery\Traits\LaravelSubQueryTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convrstion extends Model
{
    use HasFactory,
    LaravelSubQueryTrait;
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

    public function messages(){
        return $this->hasMany(ChatMessage::class)->orderBy("id","desc");
    }
    public function unread_messages(){
        return $this->hasMany(ChatMessage::class)->where("isreaded","=","0")->orderBy("id","desc");
    }


}
