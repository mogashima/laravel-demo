@extends('layouts.logined')

@section('content')
    <div class="user">
        <h2 class="h3">ユーザ一覧</h2>
        <table class="table table-bordered">
            <thead>
                <tr class="table-secondary">
                    <th>ID</th>
                    <th>名前</th>
                    <th>編集</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td><a href="{{ route('web.user.show', ['user' => $user->id]) }}">{{ $user->name }}</a></td>
                        <td>
                            @can('edit', $user)
                                <a href="{{ route('web.user.edit', ['user' => $user->id]) }}" class="btn btn-success">編集</a>
                            @endcan
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex">
            <a href="{{ route('web.user.create') }}" class="btn btn-primary ms-auto">作成</a>
        </div>
    </div>
@endsection
