<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Arr;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if(Arr::first($this) == null ){
                if(request()->is('admin')){
                    return route('login');
                }elseif(request()->is('penjual')){
                    return route('penjual.login');
                }elseif(request()->is('login')){
                    return route('auth.index');
                }
            }
            if (Arr::first($this->guards) === 'admin') {
                return route('login');
            } else if (Arr::first($this->guards) === 'penjual') {
                return route('penjual.login');
            }
        }
    }
}
