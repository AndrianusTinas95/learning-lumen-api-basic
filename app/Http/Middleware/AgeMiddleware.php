<?php

namespace App\Http\Middleware;

use Closure;

class AgeMiddleware
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
        if($request->age < 17){
            // return "kamu masih ingusan ya..., 
            // \n jangan kesini....,
            // \n pulang aja gih.. ";
            return redirect('/fail');
        }
        return $next($request);
    }
}
