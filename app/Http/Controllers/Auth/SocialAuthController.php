<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Service\SocialAccountService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Socialite;

class SocialAuthController extends Controller
{
    public function redirect($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function callback($social)
    {
        try{
            $user = SocialAccountService::createOrGetUser(Socialite::driver($social)->user(), $social);
            if (\Auth::guard('users')->loginUsingId($user->id))
            {
                return  redirect()->to('/');
//                return  redirect()->route('get_user.info');
            }
        }catch (\Exception $exception)
        {
            Log::error("[Login social ]".$exception->getMessage());
        }

        return redirect()->route('get.login');
    }
}
