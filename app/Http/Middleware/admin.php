<?php

namespace App\Http\Middleware;

use Closure;
use App\UserData;
use Illuminate\Support\Facades\Auth;

class admin
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
        $UserData = UserData::firstOrNew(['user_id' => Auth::user()->id]);
        if(!$UserData->isAdmin == 0){
            return redirect('home');
        }

        return $next($request);
    }
}
