<?php

namespace App\Exports;

use App\Models\Device;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DeviceExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Device::all()->makeHidden(['created_at', 'updated_at', 'company_id']);
    }

    public function headings(): array
    {
        return [
            'ID',
            '名前'
        ];
    }
}
