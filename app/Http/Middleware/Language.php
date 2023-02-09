<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Language
{

    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->has('lang')) {
            App::setLocale($request->session()->get('lang'));
        }
        return $next($request);
    }
}
