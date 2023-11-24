<?php

namespace App\Services;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentService extends BaseService
{
    public function validStore(Request $request)
    {
        $request->validate([
            'body' => ['required', 'string', 'max:200'],
        ]);
    }

    public function store(Request $request, $notice_id)
    {
        $data = $request->toArray();
        $data['notice_id'] = $notice_id;
        return Comment::store($data);
    }

    public function deleteByNoticeId($notice_id)
    {
        Comment::destroy($notice_id);
    }
}