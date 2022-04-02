<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlockedList extends Model
{
    use HasFactory;


    public $fillable=[
        'blocked_id',
        'blocked_type',
        'blocker_type',
        'blocker_id'
    ];

    function blocked(){
        return $this->morphTo();
    }
    function blocker(){
        return $this->morphTo();
    }
}
