@extends('layouts.logined')

@section('content')
    <div class="device">
        <h2 class="h3">端末エクセル処理</h2>
        <a href="{{ route('web.device.excel.list') }}" class="btn btn-primary">一覧ダウンロード</a>
        <div>
            {{ Form::open(['url' => route('web.device.excel.import'), 'files' => true]) }}
            @csrf
            <div class="form-group">
                <input type="file" name="file">

                <button class="btn btn-success">Excelインポート</button>
            </div>
            {{ Form::close() }}
        </div>
        <div class="d-flex">
            <a href="{{ route('web.device.index') }}" class="btn btn-success">戻る</a>
        </div>
    </div>
@endsection
