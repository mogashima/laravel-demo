@extends('layouts.logined')

@section('content')
    <div class="user">
        <h2 class="h3">ユーザ詳細</h2>
        <table class="table table-bordered">
            <tr>
                <th class="table-secondary">ID</th>
                <td>{{ $user->id }}</td>
            </tr>
            <tr>
                <th class="table-secondary">名前</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th class="table-secondary">メールアドレス</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th class="table-secondary">端末</th>
                <td>
                    @foreach ($devices as $device)
                        <label>{{ $device->name }}</label>
                    @endforeach
                </td>
            </tr>
        </table>
        <div class="d-flex">
            <a href="{{ route('web.user.index') }}" class="btn btn-primary me-auto">戻る</a>
            @can('delete', $user)
                <button class="btn btn-danger" id="deleteBtn" data-bs-toggle="modal" data-bs-target="#deleteModal">削除</button>
            @endcan
        </div>

        @component('layouts.modal.destroy')
            @slot('destroyUrl')
                {{ route('web.user.destroy', ['user' => $user->id]) }}
            @endslot
        @endcomponent
    </div>
@endsection
