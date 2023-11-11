@extends('layouts.app')

@section('base')
    <main class="login container">
        <h2 class="text-center">ログイン画面</h2>
        {{ Form::open(['url' => 'login', 'method' => 'post']) }}
        <div class="card">
            <div class="card-body">
                <div class="">
                    <label class="fs-4">メールアドレス</label>
                    {{ Form::text('email', old('email'), ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : '')]) }}
                    <p class="invalid-feedback">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
                <div class="">
                    <label class="fs-4">パスワード</label>
                    {{ Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : '')]) }}
                    <p class="invalid-feedback">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-primary">ログイン</button>
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </main>
@endsection