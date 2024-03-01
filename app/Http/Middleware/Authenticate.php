<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // return $request->expectsJson() ? null : route('login');
        if (! $request->expectsJson()) {
            // return route('login');
            if($request->is('admin') || $request->is('admin/*')){
                // in case backend
                return route('admin.login-page');
            }else{
                // in case front end
                return route('login-page');

            }
        }
    }
}
