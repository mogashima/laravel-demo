<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'notice_id',
        'created_by'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public static function store($data)
    {
        return self::create([
            'notice_id' => $data['notice_id'],
            'body' => $data['body'],
            'company_id' => Auth::user()->company_id,
            'created_by' => Auth::user()->id,
        ]);
    }

    public static function destroy($notice_id)
    {
        self::where('notice_id', $notice_id)->delete();
    }
}
