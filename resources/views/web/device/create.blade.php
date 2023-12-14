@extends('layouts.logined')

@section('content')
    <div class="device">
        <h2 class="h3">端末作成</h2>
        {{ Form::open(['url' => route('web.device.store'), 'method' => 'post']) }}
        <table class="table table-bordered">
            <tr>
                <th class="table-secondary">端末名</th>
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
                <th class="table-secondary">型番</th>
                <td>
                    {{ Form::text('serial_number', old('serial_number'), ['class' => 'form-control' . ($errors->has('serial_number') ? ' is-invalid' : '')]) }}
                    <p class="invalid-feedback">
                        @error('serial_number')
                            {{ $message }}
                        @enderror
                    </p>
                </td>
            </tr>
            <tr>
                <th class="table-secondary">金額</th>
                <td>
                    {{ Form::text('amount', old('amount'), ['class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : '')]) }}
                    <p class="invalid-feedback">
                        @error('amount')
                            {{ $message }}
                        @enderror
                    </p>
                </td>
            </tr>
        </table>

        <div class="d-flex">
            <a href="{{ route('web.device.index') }}" class="btn btn-primary me-auto">戻る</a>
            <button class="btn btn-primary ms-auto">登録</button>
        </div>
        {{ Form::close() }}

    </div>
@endsection
