<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'company_id',
        'user_id',
        'serial_number',
        'amount',
    ];

    public static function getList()
    {
        return self::select('devices.id', 'devices.name', 'devices.serial_number', 'devices.amount')->where('company_id', Auth::user()->company_id)->get();
    }

    public static function getById($id)
    {
        return self::findOrFail($id);
    }

    public static function getByUserId($user_id)
    {
        return self::select('devices.id', 'devices.name', 'devices.serial_number', 'devices.amount')
            ->leftJoin('device_owners', 'devices.id', '=', 'device_owners.device_id')
            ->where('device_owners.user_id', $user_id)->get();
    }

    public static function getShow($id)
    {
        return self::select('devices.id', 'devices.name', 'devices.serial_number', 'devices.amount', 'users.name as user_name', 'users.id as user_id')
            ->leftJoin('device_owners', 'devices.id', '=', 'device_owners.device_id')
            ->leftJoin('users', 'device_owners.user_id', '=', 'users.id')
            ->where('devices.id', $id)->firstOrFail();
    }

    public static function store($data)
    {
        return self::create([
            'name' => $data['name'],
            'serial_number' => $data['serial_number'],
            'amount' => $data['amount'],
            'company_id' => Auth::user()->company_id,
        ]);
    }

    public static function destory($id)
    {
        self::where('id', $id)->delete();
    }
}
