<?php

namespace App\Http\Controllers\Web;

use App\Services\DeviceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebDeviceController extends WebController
{
    protected $deviceService;

    public function __construct(DeviceService $deviceService)
    {
        $this->deviceService = $deviceService;
        $this->middleware('auth');
    }

    public function index()
    {
        $devices = $this->deviceService->getList();
        return view('web.device.index', compact('devices'));
    }

    public function create()
    {
        return view('web.device.create');
    }

    public function store(Request $request)
    {
        $this->deviceService->validStore($request);
        $device = $this->deviceService->store($request);
        return redirect()->route('web.device.show', ['device' => $device->id]);
    }

    public function show(Request $request, $id)
    {
        $device = $this->deviceService->getShow($id);
        return view('web.device.show', compact('device'));
    }

    public function destroy($id)
    {
        $device = $this->deviceService->getById($id);
        $device->delete();
        $this->deviceService->deleteOwner($id);
        return redirect()->route('web.device.index');
    }

    public function edit(Request $request, $id)
    {
        $device = $this->deviceService->getShow($id);
        $users = $this->deviceService->getCompanyUsers();
        return view('web.device.edit', compact('device', 'users'));
    }

    public function update(Request $request, $id)
    {
        $device = $this->deviceService->getById($id);
        $this->deviceService->validUpdate($request);
        $device->update($request->only('name'));
        $this->deviceService->updateDeviceOwner($id, $request->user_id);
        return redirect()->route('web.device.show', ['device' => $device->id]);
    }
}