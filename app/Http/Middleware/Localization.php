<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Session;

class Localization
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
        /*dd(\Session::get('website_language'));
        dd(config('app.locale'));*/
        $language = \Session::get('website_language', config('app.locale'));

        // dd($language);
        config(['app.locale' => $language]);

        return $next($request);
    }
}
