<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthGithubController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();
        dd($user);
    }
}
