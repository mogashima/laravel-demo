@extends('layouts.logined')

@section('content')
    <div class="question">
        <h2 class="h3">端末一覧</h2>
        <table class="table table-bordered">
            <thead>
                <tr class="table-secondary">
                    <th>ID</th>
                    <th>名前</th>
                    <th>編集</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($devices as $device)
                    <tr>
                        <td>{{ $device->id }}</td>
                        <td><a href="{{ route('web.device.show', ['device' => $device->id]) }}">{{ $device->name }}</a></td>
                        <td><a href="{{ route('web.device.edit', ['device' => $device->id]) }}" class="btn btn-success">編集</a></td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex">
            <a href="{{ route('web.device.create') }}" class="btn btn-primary ms-auto">作成</a>
        </div>
    @endsection
