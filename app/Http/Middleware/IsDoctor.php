<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class IsDoctor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next)
{
    $user = Auth::user(); 

    if ($user && $user->Type_Personnel === 'Doctor') {
        return $next($request);
    }

    return redirect('error')->with('fail', 'คุณไม่มีสิทธิ์เข้าถึงส่วนนี้');
}
}
