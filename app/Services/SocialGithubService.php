<?php
/**
 * Created by PhpStorm.
 * User: vital
 * Date: 2017/9/27
 * Time: 13:50
 */

namespace App\Services;

use App\Models\SocialGithubAccount;
use App\User;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialGithubService
{
    public function firstOrCreateUser(ProviderUser $providerUser)
    {
        $account = SocialGithubAccount::whereProvider('github')
            ->whereProviderUserId($providerUser->getId())
            ->first();
        if ($account)
        {
            return $account->user;
        }
        else
        {
            $account = new SocialGithubAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'github'
            ]);
            $user = User::whereEmail($providerUser->getEmail())->first();
            if (!$user)
            {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'password' => bcrypt(rand(100000, 999999))
                ]);
            }
            $account->user()->associate($user);
            $account->save();
            return $user;
        }
    }
}