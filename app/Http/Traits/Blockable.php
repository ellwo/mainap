<?php
namespace App\Http\Traits;

use App\Models\BlockedList;
use App\Models\ChatMessage;
use App\Models\Convrstion;
use Str;
trait Blockablell{



    function block($model){


       $block=BlockedList::updateOrCreate([
            'blocker_id'=>$this->id,
            'blocker_type'=>get_class($this),
            'blocked_id'=>$model->id,
            'blocked_type'=>get_class($model)
        ]);
    }
    function unblock($model){

    }
}
