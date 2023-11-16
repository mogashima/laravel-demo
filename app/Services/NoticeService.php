<?php

namespace App\Services;

use App\Models\Notice;
use Auth;
use Illuminate\Http\Request;

class NoticeService extends BaseService
{
    public function getList()
    {
        return Notice::getList();
    }

    public function getById($id)
    {
        return Notice::getById($id);
    }

    public function validStore(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:50'],
            'body' => ['required', 'string', 'max:200'],
        ]);
    }

    public function validUpdate(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:50'],
            'body' => ['required', 'string', 'max:200'],
        ]);
    }

    public function store(Request $request)
    {
        return Notice::store($request->toArray());
    }

}