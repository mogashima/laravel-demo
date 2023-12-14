@extends('layouts.pdf')

@section('content')
    <h3>ご登録端末</h3>
    <table class="device-table">
        <tr>
            <th>名前</th>
            <th>型番</th>
            <th>金額</th>
            <th>備考</th>
        </tr>
        @foreach ($devices as $device)
            <tr>
                <td>{{ $device->name }}</td>
                <td>{{ $device->serial_number }}</td>
                <td class="text-right">{{ $device->amount }}</td>
                <td></td>
            </tr>
        @endforeach
    </table>
@endsection

@section('style')
    <style>
        table.device-table {
            width: 100%;
            border-collapse: collapse;
        }

        table.device-table td {
            border: 1px solid;
            padding: 5px 16px;
        }

        table.device-table th {
            border: 1px solid;
            text-align: left;
            padding: 5px 16px;
        }

        .text-right {
            text-align: right !important;
        }
    </style>
@endsection
