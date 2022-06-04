<?php


namespace App\Service;

use App\Models\User;
use Illuminate\Support\Str;
use Laravel\Socialite\Contracts\User as ProviderUser;
use Illuminate\Support\Facades\Hash;

class SocialAccountService
{
    public static function createOrGetUser(ProviderUser $providerUser, $social)
    {
        $user = User::where([
            'provider'    => $social,
            'provider_id' => $providerUser->getId()
        ])->first();
        if ($user) return $user;

        $email = $providerUser->getEmail() ?? ($providerUser->getName() ?? $providerUser->getNickname());
        $user  = User::create([
            'provider'    => $social,
            'provider_id' => $providerUser->getId(),
            'email'       => $email,
            'slug'        => Str::slug($email),
            'name'        => $providerUser->getName(),
            'password'    => Hash::make($email),
        ]);
        return $user;
    }
}