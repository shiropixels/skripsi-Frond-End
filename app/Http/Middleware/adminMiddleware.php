<?php

namespace App\Http\Middleware;

use Closure;

class adminMiddleware
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
        $user =  $request->user();
        if($user){
            if($user->isAdmin())
            {

                return $next($request);

            }

            else if($user->isGuru())
            {
                return redirect('/home');

            }

            else if($user->isSiswa())
            {
                return redirect('/siswa');
            }

        }
        return abort(404);

    }
}
