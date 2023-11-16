<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceOwner extends Model
{
    use HasFactory;

    protected $fillable = [
        'device_id',
        'user_id'
    ];

    public static function updateDeviceOwner($device_id, $user_id)
    {
        return self::updateOrCreate(
            ['device_id' => $device_id],
            ['user_id' => $user_id]
        );
    }

    public static function deleteOwner($device_id)
    {
        self::where('device_id', $device_id)->delete();
    }
}
