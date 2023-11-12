<?php

namespace App\Services;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceService extends BaseService
{
    public function getList()
    {
        return Device::getList();
    }

    public function getById($id)
    {
        return Device::getById($id);
    }

    public function validStore(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
        ]);
    }

    public function store(Request $request)
    {
        return Device::store($request->toArray());
    }

    public function destory($id)
    {
        Device::destory($id);
    }
}