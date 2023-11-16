<?php

namespace App\Services;

use App\Models\Device;
use App\Models\DeviceOwner;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class DeviceService extends BaseService
{
    public function getList()
    {
        return Device::getList();
    }

    public function getCompanyUsers()
    {
        $users = User::where('company_id', Auth::user()->company_id)->pluck('name', 'id')->toArray();
        $users[null] = 'なし';
        return $users;
    }

    public function getById($id)
    {
        return Device::getById($id);
    }

    public function getByUserId($user_id)
    {
        return Device::getByUserId($user_id);
    }

    public function getShow($id)
    {
        return Device::getShow($id);
    }

    public function validStore(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
        ]);
    }

    public function validUpdate(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
        ]);
    }

    public function store(Request $request)
    {
        return Device::store($request->toArray());
    }

    public function updateDeviceOwner($device_id, $user_id)
    {
        return DeviceOwner::updateDeviceOwner($device_id, $user_id);
    }

    public function deleteOwner($id)
    {
        DeviceOwner::deleteOwner($id);
    }
}