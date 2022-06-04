<?php


namespace App\Http\Middleware;


use Illuminate\Http\Request;

class CheckLoginDrive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, \Closure $next)
    {
        if(get_data_user('drives')) return $next($request);

        return redirect()->route('get_drive.login');
    }
}