<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use App\Services\NoticeService;
use App\Services\CommentService;
use Illuminate\Http\Request;

class AdminNoticeController extends AdminController
{
    protected $noticeService;
    protected $commentService;

    public function __construct(NoticeService $noticeService, CommentService $commentService)
    {
        $this->noticeService = $noticeService;
        $this->commentService = $commentService;
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('index', Notice::class);
        $notices = $this->noticeService->getList();
        return view('admin.notice.index', compact('notices'));
    }

    public function create()
    {
        $this->authorize('create', Notice::class);
        return view('admin.notice.create');
    }

    public function store(Request $request)
    {
        $this->authorize('store', Notice::class);
        $this->noticeService->validStore($request);
        $notice = $this->noticeService->store($request);
        return redirect()->route('admin.notice.show', ['notice' => $notice->id]);
    }

    public function show(Request $request, $id)
    {
        $notice = $this->noticeService->getById($id);
        $this->authorize('show', $notice);
        return view('admin.notice.show', compact('notice'));
    }

    public function edit(request $request, $id)
    {
        $notice = $this->noticeService->getById($id);
        $this->authorize('edit', $notice);
        return view('admin.notice.edit', compact('notice'));
    }

    public function update(Request $request, $id)
    {
        $notice = $this->noticeService->getById($id);
        $this->authorize('update', $notice);
        $this->noticeService->validUpdate($request);
        $notice->update($request->only('title', 'body'));
        return redirect()->route('admin.notice.show', ['notice' => $notice->id]);
    }

    public function destroy($id)
    {
        $notice = $this->noticeService->getById($id);
        $this->authorize('delete', $notice);
        $notice->delete();
        $this->commentService->deleteByNoticeId($id);
        return redirect()->route('admin.notice.index');
    }
}
