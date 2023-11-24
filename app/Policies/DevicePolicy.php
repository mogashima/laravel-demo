<?php

namespace App\Policies;

use App\Models\Device;
use App\Models\User;
use App\Models\AuthCode;
use Auth;
use Illuminate\Support\Facades\Config;

class DevicePolicy
{
    public function index(User $user): bool
    {
        return AuthCode::hasAuth(Auth::user()->role_code, Config::get("authcode.device.read"));
    }

    public function create(User $user): bool
    {
        return AuthCode::hasAuth(Auth::user()->role_code, Config::get("authcode.device.create"));
    }

    public function store(User $user): bool
    {
        return AuthCode::hasAuth(Auth::user()->role_code, Config::get("authcode.device.create"));
    }

    public function show(User $user, Device $target): bool
    {
        return AuthCode::hasAuth(Auth::user()->role_code, Config::get("authcode.device.read"));
    }

    public function edit(User $user, Device $target): bool
    {
        return AuthCode::hasAuth(Auth::user()->role_code, Config::get("authcode.device.update"));
    }

    public function update(User $user, Device $target): bool
    {
        return AuthCode::hasAuth(Auth::user()->role_code, Config::get("authcode.device.update"));
    }

    public function delete(User $user, Device $target): bool
    {
        return AuthCode::hasAuth(Auth::user()->role_code, Config::get("authcode.device.delete"));
    }

}
