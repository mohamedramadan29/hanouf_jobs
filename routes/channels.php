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
    return (int)$user->id === (int)$id;
});
broadcast::channel('chat.{receiver_id}', function (\App\Models\User $user, $receiver_id) {
    return (int)$user->id === (int)$receiver_id;
},
    ['guards' => ['web', 'company', 'admin', 'api']]
);

broadcast::channel('chat2.{receiver_id}', function (\App\Models\admin\Company $user, $receiver_id) {
    return (int)$user->id === (int)$receiver_id;
},
    ['guards' => ['web', 'company', 'admin', 'api']]
);
