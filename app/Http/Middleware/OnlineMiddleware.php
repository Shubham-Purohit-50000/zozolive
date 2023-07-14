<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Log;

class OnlineMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $users_to_offline = User::where('last_activity', '<', now());
        $users_to_online = User::where('last_activity', '>=', now())->where('is_logout', 0);
        $user = null;
        if (isset($users_to_offline)) {
            $users_to_offline->update(['is_online' => false]);
        }if (isset($users_to_online)) {
            $users_to_online->update(['is_online' => true]);
        }
        if (auth()->check()) {
            $cache_value = Cache::put('user-is-online', auth()->id(), \Carbon\Carbon::now()->addMinutes(1));
            $user = User::find(Cache::get('user-is-online'));
            $user->last_activity = now()->addMinutes(1);
            $user->is_online = true;
            $user->save();

            //code to reset live host issue
            if(filled($user->model) and $user->model->is_online == 1){
                Log::info('code at 40');
                $user->model->is_online = 0;
                $user->model->update();
                Log::info(date('d m, Y H:i:s a'));
            }

        } elseif(!auth()->check() and filled(Cache::get('user-is-online'))) {
            $user = User::find(Cache::get('user-is-online'));
            if (isset($user)) {
                $user->is_online = false;
                $user->save();

                //code to reset live host issue
                if(filled($user->model) and $user->model->is_online == 1){
                    Log::info('code at 54');
                    $user->model->is_online = 0;
                    $user->model->update();
                    Log::info(date('d m, Y H:i:s a'));
                }
            }
        }

        return $next($request);
    }

    // public function handle(Request $request, Closure $next)
    // {
    //     $users_to_offline = User::where('last_activity', '<', now());
    //     $users_to_online = User::where('last_activity', '>=', now());

    //     $users_to_offline->update(['is_online' => false]);
    //     $users_to_online->update(['is_online' => true]);

    //     if (auth()->check()) {
    //         $cacheKey = 'user-is-online';
    //         $cacheValue = auth()->id();
    //         $expiration = \Carbon\Carbon::now()->addMinutes(1);

    //         // Set cache if it doesn't exist or has expired
    //         Cache::add($cacheKey, $cacheValue, $expiration);

    //         $user = auth()->user();
    //         $user->last_activity = now()->addMinutes(1);
    //         $user->is_online = true;
    //         $user->save();

    //         // Code to reset live host issue
    //         $model = optional($user->model);
    //         if ($model->is_online) {
    //             Log::info('code at 89');
    //             $model->is_online = 0;
    //             $model->save();
    //             Log::info(date('d m, Y H:i:s a'));
    //         }
    //     } elseif (filled(Cache::get('user-is-online'))) {
    //         $userId = Cache::get('user-is-online');
    //         $user = User::find($userId);

    //         if ($user) {
    //             $user->is_online = false;
    //             $user->save();

    //             // Code to reset live host issue
    //             $model = optional($user->model);
    //             if ($model->is_online) {
    //                 Log::info('code at 105');
    //                 $model->is_online = 0;
    //                 $model->save();
    //                 Log::info(date('d m, Y H:i:s a'));
    //             }
    //         }

    //     }

    //     return $next($request);
    // }

}
