<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Device;
use Maatwebsite\Excel\Concerns\ToModel;
use Auth;

class DeviceImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Device([
            'name' => $row['name'],
            'company_id' => Auth::user()->company_id
        ]);
    }
}
