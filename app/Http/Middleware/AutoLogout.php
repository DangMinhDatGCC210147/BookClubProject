<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AutoLogout
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
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (Auth::check()) {
            $lastActivity = Session::get('lastActivityTime');
            $currentTime = now();

            // Kiểm tra thời gian kể từ lần hoạt động cuối cùng
            if ($lastActivity != null && $currentTime->diffInMinutes($lastActivity) > 30) {
                Auth::logout();
                Session::forget('lastActivityTime'); // Xóa session
                return redirect('/')->with('warning', 'You have been inactive for more than 30 minutes and have been automatically logged out.');
            }

            // Cập nhật thời gian hoạt động cuối cùng
            Session::put('lastActivityTime', $currentTime);
        }

        return $next($request);
    }
}
