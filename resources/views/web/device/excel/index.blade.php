@extends('layouts.logined')

@section('content')
    <div class="device">
        <h2 class="h3">端末エクセル処理</h2>
        <div>
                @if (session('importError'))
                <div class="alert alert-danger" role="alert">
                    {{ session('importError') }}
                </div>
                @endif
        </div>
        <div class="accordion my-3" id="deviceAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseDownloadList" aria-expanded="false" aria-controls="collapseDownloadList">
                        端末一覧ダウンロード(Excel形式)
                    </button>
                </h2>
                <div id="collapseDownloadList" class="accordion-collapse collapse" data-bs-parent="#deviceAccordion">
                    <div class="accordion-body">
                        <p>端末一覧情報をExcel形式でダウンロードします。</p>
                        <p>ダウンロードしたファイルを編集しアップロードすることでデータの一括登録・更新もできます。</p>
                        <a href="{{ route('web.device.excel.list') }}" class="btn btn-primary">一覧ダウンロード</a>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseImport" aria-expanded="true" aria-controls="collapseImport">
                            端末情報アップロード
                        </button>
                    </h2>
                    <div id="collapseImport" class="accordion-collapse collapse show" data-bs-parent="#deviceAccordion">
                        <div class="accordion-body">
                            <div>
                                <p>Excel形式のファイルをアップロードすることで端末情報を一括で登録・更新できます。</p>
                                <p>アップロードするファイルは端末一覧ダウンロードから取得してください。</p>
                            </div>
                            <div>
                                {{ Form::open(['url' => route('web.device.excel.import'), 'files' => true]) }}
                                @csrf
                                <div class="form-group">
                                    <input type="file" name="file">

                                    <button class="btn btn-success">Excelアップロード</button>
                                </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex">
            <a href="{{ route('web.device.index') }}" class="btn btn-success">戻る</a>
        </div>
    </div>
@endsection
