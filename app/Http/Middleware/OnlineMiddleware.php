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
            //code to reset live host issue
            if(auth()->check() and filled(auth()->user()->model) and auth()->user()->model->is_online == 1){
                Log::info('code at 30');
                $user = auth()->user();
                $user->model->is_online = 0;
                $user->model->update();
                Log::info(date('d m, Y H:i:s a'));
            }
        }if (isset($users_to_online)) {
            $users_to_online->update(['is_online' => true]);
        }
        if (auth()->check()) {
            $cache_value = Cache::put('user-is-online', auth()->id(), \Carbon\Carbon::now()->addMinutes(1));
            $user = User::find(Cache::get('user-is-online'));
            $user->last_activity = now()->addMinutes(1);
            $user->is_online = true;
            $user->save();

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

}
