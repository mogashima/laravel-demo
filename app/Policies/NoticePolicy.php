<?php

namespace App\Policies;

use App\Models\Notice;
use App\Models\User;
use App\Models\AuthCode;
use Auth;
use Illuminate\Support\Facades\Config;

class NoticePolicy
{
    public function index(User $user): bool
    {
        return AuthCode::hasAuth(Auth::user()->role_code, Config::get("authcode.notice.read"));
    }

    public function create(User $user): bool
    {
        return AuthCode::hasAuth(Auth::user()->role_code, Config::get("authcode.notice.create"));
    }

    public function store(User $user): bool
    {
        return AuthCode::hasAuth(Auth::user()->role_code, Config::get("authcode.notice.create"));
    }

    public function show(User $user, Notice $target): bool
    {
        return AuthCode::hasAuth(Auth::user()->role_code, Config::get("authcode.notice.read"));
    }

    public function edit(User $user, Notice $target): bool
    {
        return AuthCode::hasAuth(Auth::user()->role_code, Config::get("authcode.notice.update"));
    }

    public function update(User $user, Notice $target): bool
    {
        return AuthCode::hasAuth(Auth::user()->role_code, Config::get("authcode.notice.update"));
    }

    public function delete(User $user, Notice $target): bool
    {
        return AuthCode::hasAuth(Auth::user()->role_code, Config::get("authcode.notice.delete"));
    }

}
