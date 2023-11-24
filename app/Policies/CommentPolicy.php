<?php

namespace App\Policies;

use App\Models\Device;
use App\Models\User;
use App\Models\AuthCode;
use Auth;
use Illuminate\Support\Facades\Config;

class CommentPolicy
{

    public function create(User $user): bool
    {
        return AuthCode::hasAuth(Auth::user()->role_code, Config::get("authcode.comment.create"));
    }

    public function store(User $user): bool
    {
        return AuthCode::hasAuth(Auth::user()->role_code, Config::get("authcode.comment.create"));
    }

}
