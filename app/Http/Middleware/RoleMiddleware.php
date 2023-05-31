<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (strpos($role, '|')) {
            $roles = explode('|', $role);
            foreach ($roles as $key => $value) {
                if (isRole($value)) {
                    return $next($request);
                }
            }
        } else {
            if (isRole($role)) {
                return $next($request);
            }
        }
        if (request()->wantsJson()) {
            return response()->json(['message' => 'USER DOES NOT HAVE ANY OF THE NECESSARY ACCESS RIGHTS.'], 403);
        }
        abort(403, 'USER DOES NOT HAVE ANY OF THE NECESSARY ACCESS RIGHTS.');
    }
}
