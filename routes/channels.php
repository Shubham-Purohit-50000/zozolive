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
Broadcast::channel('agora-online-channel', function ($user) {
    return ['id' => $user->uuid, 'name' => $user->name];
});


Broadcast::channel('decline-agora-video', function ($id) {
    return $id;
});

Broadcast::channel('accept-agora-video', function ($id) {
    return $id;
});

Broadcast::channel('end-agora-video', function ($id) {
    return $id;
});

// Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });
