@extends('layouts.logined')

@section('content')
    <div class="question">
        <h2 class="h3">端末編集</h2>
        {{ Form::open(['url' => route('web.device.update', ['device' => $device->id]), 'method' => 'put']) }}
        <table class="table table-bordered">
            <tr>
                <th class="table-secondary">ID</th>
                <td>{{ $device->id }}</td>
            </tr>
            <tr>
                <th class="table-secondary">端末名</th>
                <td>
                    {{ Form::text('name', old('name', $device->name), ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) }}
                    <p class="invalid-feedback">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </p>
                </td>
            </tr>
            <tr>
                <th class="table-secondary">使用者</th>
                <td>
                    {{ Form::select('user_id', $users, $device->user_id, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) }}
                    <p class="invalid-feedback">
                        @error('user_id')
                            {{ $message }}
                        @enderror
                    </p>
                </td>
            </tr>
        </table>
        <div class="d-flex">
            <a href="{{ route('web.device.index') }}" class="btn btn-primary me-auto">戻る</a>
            <button class="btn btn-primary ms-auto">更新</button>
        </div>
        {{ Form::close() }}
    </div>
@endsection
