@extends('layouts.pdf')

@section('content')
    <h1>端末一覧</h1>
    <table class="sushiTable">
        <tr>
            <th>ID</th>
            <th>名前</th>
        </tr>
        @foreach ($devices as $device)
            <tr>
                <td>{{ $device->id }}</td>
                <td>{{ $device->name }}</td>
            </tr>
        @endforeach
    </table>
@endsection

@section('style')
    <style>
        table td {
            border: 1px solid;
        }
    </style>
@endsection
