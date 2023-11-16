<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;

class UserService extends BaseService
{
    public function getList()
    {
        return User::getList();
    }

    public function getById($id)
    {
        return User::getById($id);
    }

    public function getShow($id)
    {
        return User::getShow($id);
    }

    public function validStore(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function validUpdate(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,id,' . $request->id . ',email'],
        ]);
    }

    public function store(Request $request)
    {
        return User::store($request->toArray());
    }

    public function destory($id)
    {
        User::destory($id);
    }

}