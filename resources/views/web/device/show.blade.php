@extends('layouts.logined')

@section('content')
    <div class="question">
        <h2 class="h3">端末詳細</h2>
        <table class="table table-bordered">
            <tr>
                <th class="table-secondary">ID</th>
                <td>{{ $device->id }}</td>
            </tr>
            <tr>
                <th class="table-secondary">名前</th>
                <td>{{ $device->name }}</td>
            </tr>
        </table>
        <div class="d-flex">
            <a href="{{ route('web.device.index') }}" class="btn btn-primary me-auto">戻る</a>
            <button class="btn btn-danger" id="deleteBtn" data-bs-toggle="modal" data-bs-target="#deleteModal">削除</button>
        </div>

        @component('layouts.modal.destroy')
            @slot('destroyUrl')
                {{ route('web.device.destroy', ['device' => $device->id]) }}
            @endslot
        @endcomponent
    @endsection
