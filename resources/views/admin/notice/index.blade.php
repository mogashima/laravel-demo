@extends('layouts.logined')

@section('content')
    <div class="notice">
        <h2 class="h3">お知らせ一覧</h2>
        <table class="table table-bordered">
            <thead>
                <tr class="table-secondary">
                    <th>ID</th>
                    <th>タイトル</th>
                    <th>編集</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notices as $notice)
                    <tr>
                        <td>{{ $notice->id }}</td>
                        <td><a href="{{ route('admin.notice.show', ['notice' => $notice->id]) }}">{{ $notice->title }}</a>
                        </td>
                        <td>
                            @can('edit', $notice)
                                <a href="{{ route('admin.notice.edit', ['notice' => $notice->id]) }}"
                                    class="btn btn-success">編集</a>
                            @endcan
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex">
            <a href="{{ route('admin.notice.create') }}" class="btn btn-primary ms-auto">作成</a>
        </div>
    </div>
@endsection
