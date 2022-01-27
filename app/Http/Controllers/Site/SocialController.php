<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use App\User;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {

        $getInfo = Socialite::driver($provider)->user();

        $user = $this->createUser($getInfo, $provider);

        auth()->login($user);

        return redirect()->route('home');

    }

    function createUser($getInfo, $provider)
    {

        $user       = User::where('email', $getInfo->email)->first();
        $providerId = $provider . '_id';
        // Tạo user mới
        if (!$user) {
            $user = User::create([
                'name'      => $getInfo->name,
                'email'     => $getInfo->email,
                'password'  => bcrypt(Str::random(8)),
                $providerId => $getInfo->id,
            ]);
        } else {
            $user->update([
                $providerId => $getInfo->id
            ]);
        }

        return $user;
    }
}
