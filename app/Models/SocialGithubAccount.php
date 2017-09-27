<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class SocialGithubAccount extends Model
{
    protected $fillable = ['user_id', 'provider_user_id', 'provider'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
