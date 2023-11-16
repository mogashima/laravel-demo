<?php

namespace App\Http\Controllers\Web;


use App\Models\User;
use App\Services\DeviceService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebUserController extends WebController
{
    protected $userService;
    protected $deviceService;

    public function __construct(UserService $userService, DeviceService $deviceService)
    {
        $this->userService = $userService;
        $this->deviceService = $deviceService;
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('index', User::class);
        $users = $this->userService->getList();
        return view('web.user.index', compact('users'));
    }

    public function show(Request $request, $id)
    {
        $user = $this->userService->getById($id);
        $devices = $this->deviceService->getByUserId($id);
        return view('web.user.show', compact('user', 'devices'));
    }



    public function create()
    {
        return view('web.user.create');
    }

    public function store(Request $request)
    {
        $this->userService->validStore($request);
        $user = $this->userService->store($request);
        return redirect()->route('web.user.show', ['user' => $user->id]);
    }

    public function edit(Request $request, $id)
    {
        $user = $this->userService->getById($id);
        return view('web.user.edit', compact('user'));
    }

    public function destroy($id)
    {
        $this->userService->destory($id);
        return redirect()->route('web.user.index');
    }

    public function update(Request $request, $id)
    {
        $user = $this->userService->getById($id);
        $this->userService->validUpdate($request);
        $user->update($request->only('name', 'email'));
        return redirect()->route('web.user.show', ['user' => $user->id]);
    }
}
