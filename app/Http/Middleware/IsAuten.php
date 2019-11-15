<?php

namespace App\Http\Middleware;

use Closure;

class IsAuten
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   if(!isset($_SESSION)){
                                session_start();
                            }
        if (!isset($_SESSION['dr_user'])) {    
                                            return redirect('login');
                                        }
        return $next($request);
    }
}
