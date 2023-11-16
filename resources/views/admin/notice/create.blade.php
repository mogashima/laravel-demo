@extends('layouts.logined')

@section('content')
    <div class="notice">
        <h2 class="h3">お知らせ作成</h2>
        {{ Form::open(['url' => route('admin.notice.store'), 'method' => 'post']) }}
        <table class="table table-bordered">
            <tr>
                <th class="table-secondary">タイトル</th>
                <td>
                    {{ Form::text('title', old('title'), ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : '')]) }}
                    <p class="invalid-feedback">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </p>
                </td>
            </tr>
            <tr>
                <th class="table-secondary">内容</th>
                <td>
                    {{ Form::textarea('body', old('body'), ['class' => 'form-control' . ($errors->has('body') ? ' is-invalid' : ''), 'rows' => '8']) }}
                    <p class="invalid-feedback">
                        @error('body')
                            {{ $message }}
                        @enderror
                    </p>
                </td>
            </tr>

        </table>

        <div class="d-flex">
            <a href="{{ route('admin.notice.index') }}" class="btn btn-primary me-auto">戻る</a>
            <button class="btn btn-primary ms-auto">登録</button>
        </div>
        {{ Form::close() }}

    </div>
@endsection
