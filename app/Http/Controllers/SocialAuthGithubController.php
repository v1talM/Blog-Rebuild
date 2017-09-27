<?php

namespace App\Http\Controllers;

use App\Services\SocialGithubService;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthGithubController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback(SocialGithubService $service)
    {
        $user = $service->firstOrCreateUser(Socialite::driver('github')->user());
        auth()->login($user);
        return redirect()->to('/');
    }
}
