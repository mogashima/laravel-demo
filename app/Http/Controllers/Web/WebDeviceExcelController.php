<?php

namespace App\Http\Controllers\Web;

use App\Services\DevicePdfService;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DeviceExport;
use App\Imports\DeviceImport;

class WebDeviceExcelController extends WebController
{
    protected $devicePdfService;

    public function __construct(DevicePdfService $devicePdfService)
    {
        $this->devicePdfService = $devicePdfService;
        $this->middleware('auth');
    }

    public function index()
    {
        return view('web.device.excel.index');
    }

    public function downloadList()
    {
        $date = date('Y-m-d H:i:s');
        return Excel::download(new DeviceExport, "$date.xlsx");
    }

    public function import()
    {

        //ファイルが選択されていない場合
        if (request()->file('file') == false) {
            return back()->with('importMessage', 'ファイルを選択してください');
        }

        Excel::import(new DeviceImport, request()->file('file'));
        return redirect()->route('web.device.index');
    }



}