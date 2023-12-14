<?php

namespace App\Http\Controllers\Web;

use App\Services\DeviceExcelService;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Logics\DeviceExcelImportLogic;
use App\Exports\DeviceExport;
use App\Imports\DeviceImport;

class WebDeviceExcelController extends WebController
{
    protected $deviceExcelService;

    public function __construct(DeviceExcelService $deviceExcelService)
    {
        $this->deviceExcelService = $deviceExcelService;
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

    public function store(Request $request)
    {
        $this->deviceExcelService->bulkStore($request->all());
        return redirect()->route('web.device.index');
    }

    public function import(Request $request)
    {
        $deviceExcelImportLogic = new DeviceExcelImportLogic($request->file('file'));
        //Excel::import(new DeviceImport, request()->file('file'));
        if ($deviceExcelImportLogic->hasErrorMessage()) {
            return back()->with('importError', $deviceExcelImportLogic->getErrorMessage());
        }

        $datas = $deviceExcelImportLogic->getDatas();
        $canStore = $deviceExcelImportLogic->canStore();
        return view('web.device.excel.import', compact('datas', 'canStore'));


    }



}