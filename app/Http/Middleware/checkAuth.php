<?php

namespace App\Http\Middleware;

use Closure;

class checkAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // return $next($request);
        // User đã đăng nhập
        if (Auth::check()) {
            $user = Auth::user();
            // nếu level == 1 thì cho qua 
            if ($user->level == 1) {
                return next($request);
            }
            else {
                Auth::logout();
                return redirect()->route('getLogin');
            }
        }
        else {
            return redirect('/login');
        }
    }
}
