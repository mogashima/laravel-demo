<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class AuthCode extends Model
{
    use HasFactory;
    protected $fillable = [
        'auth_code',
        'name'
    ];

    public static function getCodesByRoleCode($role_code)
    {
        return self::select('auth_codes.auth_code')
            ->join('role_auth_relations', 'auth_codes.auth_code', '=', 'role_auth_relations.auth_code')
            ->where('role_auth_relations.role_code', $role_code)
            ->get()->pluck('auth_code');
    }

    public static function hasAuth($role_code, $auth_code)
    {
        return self::getCodesByRoleCode($role_code)->contains($auth_code);
    }

    public static function isAdmin(){
        return Auth::user()->role_code == 'admin';
    }

    public static function isUser(){
        return Auth::user()->role_code == 'user';
    }
}
