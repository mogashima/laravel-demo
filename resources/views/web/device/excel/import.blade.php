@extends('layouts.logined')

@section('content')
    <div class="device">
        <h2 class="h3">端末アップロード確認</h2>
        {{ Form::open(['url' => route('web.device.excel.store'), 'method' => 'post']) }}
        <table class="table table-bordered">
            <thead>
                <tr class="table-secondary">
                    <th>ID</th>
                    <th>端末名</th>
                    <th>型番</th>
                    <th>金額</th>
                    <th>エラー</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>
                            {{ $data[0] }}{{ Form::hidden('id[]', $data[0]) }}
                        </td>
                        <td>{{ $data[1] }}{{ Form::hidden('name[]', $data[1]) }}</td>
                        <td>{{ $data[2] }}{{ Form::hidden('serial_number[]', $data[2]) }}</td>
                        <td>{{ $data[3] }}{{ Form::hidden('amount[]', $data[3]) }}</td>
                        <td class="text-danger">{{ $data[4] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex">
            <a href="{{ route('web.device.excel.index') }}" class="btn btn-success">戻る</a>
            @if ($canStore)
                <button class="btn btn-primary ms-auto">登録</button>
            @endif
        </div>
        {{ Form::close() }}
    </div>
@endsection
