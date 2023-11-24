<?php

namespace App\Http\Controllers\Web;

use App\Models\Comment;
use App\Services\CommentService;
use App\Services\NoticeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebCommentController extends WebController
{
    protected $noticeService;
    protected $commentService;

    public function __construct(NoticeService $noticeService, CommentService $commentService)
    {
        $this->noticeService = $noticeService;
        $this->commentService = $commentService;
        $this->middleware('auth');
    }

    public function create($notice_id)
    {
        $this->authorize('create', Comment::class);
        return view('web.comment.create', compact('notice_id'));
    }

    public function store(Request $request, $notice_id)
    {
        $this->authorize('store', Comment::class);
        $this->commentService->validStore($request);
        $comment = $this->commentService->store($request, $notice_id);
        return redirect()->route('admin.notice.show', ['notice' => $notice_id]);
    }
}