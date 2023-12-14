<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Device;
use Barryvdh\DomPDF\Facade\Pdf;

class DeviceExcelService extends BaseService
{
    public function convertImportData(UploadedFile $file){
        $datas = Excel::toArray(null, $file)[0];
        array_shift($datas);
        return $datas;
    }

    public function bulkStore($datas){
        dd($datas);
    }
}