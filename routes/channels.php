<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel("userchatrooms.{id}",function($id){
    return true;

});
<<<<<<< HEAD

Broadcast::channel("chatroom.{id}",function(){
    return true;

});
=======
>>>>>>> e898d1e3573b758bd51eb91352a82c68d3ab8ff1
