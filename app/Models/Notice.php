<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Notice extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'company_id',
        'created_by'
    ];

    public static function getList()
    {
        return self::select('notices.id', 'notices.title')->where('company_id', Auth::user()->id)->get();
    }

    public static function store($data)
    {
        return self::create([
            'title' => $data['title'],
            'body' => $data['body'],
            'company_id' => Auth::user()->company_id,
            'created_by' => Auth::user()->id,
        ]);
    }

    public static function getById($id)
    {
        return self::findOrFail($id);
    }

    public static function getShow($id)
    {
        return self::findOrfail($id);
    }

    public function comments()
    {
        //Userモデルのデータを取得する
        return $this->hasMany(Comment::class);
    }
}
