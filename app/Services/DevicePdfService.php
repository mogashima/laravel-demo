<?php

namespace App\Services;

use App\Models\Device;
use Barryvdh\DomPDF\Facade\Pdf;

class DevicePdfService extends BaseService
{
    public function output()
    {
        $devices = Device::getList();

        $pdf = PDF::loadView('pdf.device', compact('devices'));
        $pdf->setPaper('A4');
        return $pdf;
    }
}