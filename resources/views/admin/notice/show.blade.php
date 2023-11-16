@extends('layouts.logined')

@section('content')
    <div class="notice">
        <h2 class="h3">お知らせ詳細</h2>
        <table class="table table-bordered">
            <tr>
                <th class="table-secondary">ID</th>
                <td>{{ $notice->id }}</td>
            </tr>
            <tr>
                <th class="table-secondary">タイトル</th>
                <td>{{ $notice->title }}</td>
            </tr>
            <tr>
                <th class="table-secondary">内容</th>
                <td>{{ $notice->body }}</td>
            </tr>
        </table>

        <div class="d-flex mt-3">
            <a href="{{ route('admin.notice.index') }}" class="btn btn-primary me-auto">戻る</a>
            <button class="btn btn-danger" id="deleteBtn" data-bs-toggle="modal" data-bs-target="#deleteModal">削除</button>
        </div>

        <div class="accordion mt-3" id="accordionComment">
            @foreach ($notice->comments as $comment)
                <div class="accordion-item">
                    <div class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{ $comment->id }}" aria-expanded="true" aria-controls="collapseOne">
                            <span>{{ $comment->created_at}}</span><span class="ms-3">{{$comment->user->name }}</span>
                        </button>
                    </div>
                    <div id="collapse{{ $comment->id }}" class="accordion-collapse collapse"
                        data-bs-parent="#accordionComment">
                        <div class="accordion-body">
                            {{ $comment->body }}
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
        <div class="d-flex mt-3">
            <a href="{{ route('web.comment.create', ['notice' => $notice->id]) }}" class="btn btn-primary ms-auto">コメント</a>
        </div>

        @component('layouts.modal.destroy')
            @slot('destroyUrl')
                {{ route('admin.notice.destroy', ['notice' => $notice->id]) }}
            @endslot
        @endcomponent
    </div>
@endsection
