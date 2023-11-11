@extends('layouts.app')

@section('base')
    <main class="login container">
        <h2 class="text-center">ログイン画面</h2>
        {{ Form::open(['url' => route('register'), 'method' => 'post']) }}
        <div class="card">
            <div class="card-body">
                <div class="">
                    <label class="fs-4">会社名</label>
                    {{ Form::text('company_name', old('company_name'), ['class' => 'form-control' . ($errors->has('company_name') ? ' is-invalid' : '')]) }}
                    <p class="invalid-feedback">
                        @error('company_name')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
                <div class="">
                    <label class="fs-4">利用者名</label>
                    {{ Form::text('name', old('name'), ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) }}
                    <p class="invalid-feedback">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
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
                <div class="">
                    <label class="fs-4">パスワード確認</label>
                    {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-primary">登録</button>
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </main>
@endsection