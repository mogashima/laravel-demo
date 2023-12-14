<?php

namespace App\Http\Controllers\Web;

use App\Services\DevicePdfService;
use App\Models\Device;

class WebPdfController extends WebController
{
    protected $devicePdfService;

    public function __construct(DevicePdfService $devicePdfService)
    {
        $this->devicePdfService = $devicePdfService;
        $this->middleware('auth');
    }

    public function deviceOutput()
    {
        $pdf = $this->devicePdfService->output();
        //return $pdf->download('device.pdf');
        return $pdf->stream();
        //$devices = Device::getList();
        //return view('pdf.device', compact('devices'));
    }

}