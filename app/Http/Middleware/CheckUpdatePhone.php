<?php


namespace App\Http\Middleware;


use Illuminate\Http\Request;

class CheckUpdatePhone
{
    public function handle(Request $request, \Closure $next)
    {
        if((get_data_user('users') && get_data_user('users','phone')) ||  !get_data_user('users')) {
            return $next($request);
        }

        \Session::flash('toastr', [
            'update_info' => 'Mời bạn cập nhật số điện thoại và các thông tin cá nhân khác'
        ]);
        return redirect()->route('get_user.info');
    }
}