<?php

namespace App\Logics;

use Illuminate\Http\UploadedFile;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class DeviceExcelImportLogic
{
    private $errorMessage = "";
    private $datas = [];
    private $hasError = true;
    public function __construct(UploadedFile $file = null)
    {
        if ($file === null) {
            $this->errorMessage = "ファイルを選択されていません";
            return;
        }
        $this->convertImportData($file);

        if (count($this->datas[0]) != 4) {
            $this->errorMessage = "ファイルのヘッダー形式が不正です";
            return;
        }
        if (count($this->datas) < 2) {
            $this->errorMessage = "アップロードデータが0件です";
            return;
        }

        for ($i = 0; $i < count($this->datas); $i++) {
            $error = $this->getValidateError($this->datas[$i]);
            $this->datas[$i][] = $error;
            $this->hasError = $this->hasError & ($error == "");
        }
    }

    public function canStore()
    {
        return $this->hasError;
    }

    public function getDatas()
    {

        return $this->datas;
    }

    public function hasErrorMessage()
    {
        return $this->errorMessage != "";
    }

    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    private function convertImportData(UploadedFile $file)
    {
        $this->datas = Excel::toArray(null, $file)[0];
        array_shift($this->datas);
    }

    private function getValidateError($data)
    {
        $param = [
            'id' => $data[0],
            'name' => $data[1],
            'serial_number' => $data[2],
            'amount' => $data[3],
        ];
        $validator = Validator::make($param, [
            'name' => ['required', 'string', 'max:50'],
            'serial_number' => ['nullable', 'string', 'max:20'],
            'amount' => ['nullable', 'integer', 'digits_between:0,5'],
        ]);

        return $validator->errors()->first();
    }
}
