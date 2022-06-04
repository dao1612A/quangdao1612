<?php

namespace Modules\Admin\Http\Controllers\Auth;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\AdminLoginRequest;

class AdminLoginController extends Controller
{
    public function login()
    {
        return view('admin::pages.auth.login');
    }

    public function postLogin(AdminLoginRequest  $request)
    {
        $credentials = $request->only('email', 'password');
        if (\Auth::guard('admins')->attempt($credentials)) {
            return redirect()->route('get_admin.dashboard');
        }

        return  redirect()->back();
    }

    public function logout()
    {
        \Auth::logout();
        return redirect()->route('get_admin.login');
    }
}
