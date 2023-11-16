@extends('layouts.logined')

@section('content')
    <div class="notice">
        <h2 class="h3">コメント作成</h2>
        {{ Form::open(['url' => route('web.comment.store', ['notice' => $notice_id]), 'method' => 'post']) }}
        <table class="table table-bordered">
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
            <a href="{{ route('admin.notice.show', ['notice' => $notice_id]) }}" class="btn btn-primary me-auto">戻る</a>
            <button class="btn btn-primary ms-auto">登録</button>
        </div>
        {{ Form::close() }}

    </div>
@endsection
