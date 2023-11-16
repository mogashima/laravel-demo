@extends('layouts.logined')

@section('content')
    <div class="user">
        <h2 class="h3">ユーザ作成</h2>
        {{ Form::open(['url' => route('web.user.store'), 'method' => 'post']) }}
        <table class="table table-bordered">
            <tr>
                <th class="table-secondary">名前</th>
                <td>
                    {{ Form::text('name', old('name'), ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) }}
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
                    {{ Form::text('email', old('email'), ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : '')]) }}
                    <p class="invalid-feedback">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </p>
                </td>
            </tr>
            <tr>
                <th class="table-secondary">パスワード</th>
                <td>
                    {{ Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : '')]) }}
                    <p class="invalid-feedback">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </p>
                </td>
            </tr>
            <tr>
                <th class="table-secondary">パスワード確認</th>
                <td>
                    {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                </td>
            </tr>

        </table>

        <div class="d-flex">
            <a href="{{ route('web.user.index') }}" class="btn btn-primary me-auto">戻る</a>
            <button class="btn btn-primary ms-auto">登録</button>
        </div>
        {{ Form::close() }}

    </div>
@endsection
