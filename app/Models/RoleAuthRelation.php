<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleAuthRelation extends Model
{
    use HasFactory;
    protected $fillable = [
        'auth_code',
        'role_code'
    ];
}
