<?php

namespace App\Policies;

use App\Models\User;
use App\Models\AuthCode;
use Auth;
use Illuminate\Support\Facades\Config;

class UserPolicy
{
    public function index(User $user): bool
    {
        return AuthCode::hasAuth(Auth::user()->role_code, Config::get("authcode.user.read"));
    }

    public function show(User $user, User $target): bool
    {
        return AuthCode::hasAuth(Auth::user()->role_code, Config::get("authcode.user.read"));
    }

    public function edit(User $user, User $target): bool
    {
        if (AuthCode::isUser()) {
            if ($user->id != $target->id) {
                return false;
            }
        }
        return AuthCode::hasAuth(Auth::user()->role_code, Config::get("authcode.user.update"));
    }

    public function update(User $user, User $target): bool
    {
        if (AuthCode::isUser()) {
            if ($user->id != $target->id) {
                return false;
            }
        }
        return AuthCode::hasAuth(Auth::user()->role_code, Config::get("authcode.user.update"));
    }

    public function create(User $user): bool
    {
        return AuthCode::hasAuth(Auth::user()->role_code, Config::get("authcode.user.create"));
    }

    public function store(User $user): bool
    {
        return AuthCode::hasAuth(Auth::user()->role_code, Config::get("authcode.user.create"));
    }

    public function delete(User $user, User $target): bool
    {
        if ($user->id == $target->id) {
            return false;
        }
        return AuthCode::hasAuth(Auth::user()->role_code, Config::get("authcode.user.delete"));
    }

}
