<?php

namespace App\Http\Middleware;

use App\Models\Hours;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckInOrOutStatus
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
        if(Auth::guest()) return $next($request);

        $uid = $request->user()->id;
        $lastEntry = Hours::where('user_id', $uid)->orderBy('id', 'desc')->first();

        if(!$lastEntry) return $next($request);

        if($lastEntry->clock_out == null)
        {
            $request->session()->put('clockStatus', true);
        }
        else {
            $request->session()->put('clockStatus', false);
        }

        return $next($request);
    }
}
