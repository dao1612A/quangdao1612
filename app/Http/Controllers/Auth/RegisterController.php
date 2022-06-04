<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Configuration;
use App\Models\System\PayHistory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        $presenter = $request->presenter;
        return view('pages.auth.register', compact('presenter'));
    }

    public function postRegister(RegisterRequest $request)
    {
        try {

            $user = User::create([
                'name'     => $request->name,
                'slug'     => Str::slug($request->name),
                'email'    => $request->email,
                'phone'    => $request->phone,
                'password' => bcrypt($request->password),
            ]);

            if (!$user) return redirect()->back();

            if (\Auth::guard('users')->loginUsingId($user->id)) {
                \Session::flash('toastr', [
                    'type'    => 'success',
                    'message' => 'Đăng ký thành công'
                ]);
            }

            return  redirect()->to('/');
        } catch (\Exception $e) {
            \Log::info($e->getMessage());
        }

        return redirect('/');
    }
}
