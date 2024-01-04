<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MiddlewareCheck
{
    public function handle($request, Closure $next, $age, $view)
    {
        if (! Auth::user()->hasRole('admin'))
        {
            return redirect(route('shop.index'));
        }

        if (! $age == 20 )
        {
            return redirect('/');
        }

        if ( $view != 'view' )
        {
            return redirect('/');
        }

        return $next($request);
    }
}
