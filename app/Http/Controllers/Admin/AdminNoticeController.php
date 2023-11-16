<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\NoticeService;
use Illuminate\Http\Request;

class AdminNoticeController extends AdminController
{
    protected $noticeService;
    public function __construct(NoticeService $noticeService)
    {
        $this->noticeService = $noticeService;
        $this->middleware('auth');
    }

    public function index()
    {
        $notices = $this->noticeService->getList();
        return view('admin.notice.index', compact('notices'));
    }

    public function create()
    {
        return view('admin.notice.create');
    }

    public function store(Request $request)
    {
        $this->noticeService->validStore($request);
        $notice = $this->noticeService->store($request);
        return redirect()->route('admin.notice.show', ['notice' => $notice->id]);
    }

    public function show(Request $request, $id)
    {
        $notice = $this->noticeService->getById($id);
        return view('admin.notice.show', compact('notice'));
    }
}
