<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        if(\Session::has('admin')) {
            return $next($request);
        } else if (!\Session::has('admin'))
        {
            if (!\Auth::user())
            {
                return redirect(route('login'));
            } else if (\Auth::user()->admin == 1)
            {
                return redirect(route('adminLogin'));
            }
        }
        return redirect('/');
    }
}