@extends('layouts.logined')

@section('content')
    <div class="user">
        <h2 class="h3">ユーザ編集</h2>
        {{ Form::open(['url' => route('web.user.update', ['user' => $user->id]), 'method' => 'put']) }}
        <table class="table table-bordered">
            <tr>
                <th class="table-secondary">ID</th>
                <td>{{ $user->id }}</td>
            </tr>
            <tr>
                <th class="table-secondary">名前</th>
                <td>
                    {{ Form::text('name', old('name', $user->name), ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) }}
                    <p class="invalid-feedback">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </p>
                </td>
            </tr>
            <tr>
                <th class="table-secondary">メールアドレス</th>
                <td>
                    {{ Form::text('email', old('email', $user->email), ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : '')]) }}
                    <p class="invalid-feedback">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </p>
                </td>
            </tr>
        </table>
        <div class="d-flex">
            <a href="{{ route('web.user.index') }}" class="btn btn-primary me-auto">戻る</a>
            <button class="btn btn-primary ms-auto">更新</button>
        </div>
        {{ Form::close() }}
    </div>
@endsection
