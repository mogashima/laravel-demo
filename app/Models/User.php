<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Hash;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_code',
        'company_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function getList()
    {
        return self::select('users.id', 'users.name')->where('company_id', Auth::user()->id)->get();
    }

    public static function getById($id)
    {
        return self::findOrFail($id);
    }

    public static function store($data)
    {
        return self::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'company_id' => Auth::user()->company_id,
            'role_code' => 'user',
        ]);
    }

    public static function destory($id)
    {
        self::where('id', $id)->delete();
    }
}
