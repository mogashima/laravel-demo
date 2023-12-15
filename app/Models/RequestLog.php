<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class RequestLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'uri', 'method', 'status', 'param', 'response', 'note', 'company_id', 'created_by'
    ];

    public static function write(Request $request, Response $response, $note = "")
    {
        $user = Auth::user();
        self::create([
            'uri' => $request->getPathInfo(),
            'method' => $request->getMethod(),
            'status' => $response->getStatusCode(),
            'param' => json_encode($request->except(['password', 'password_confirmation']), JSON_UNESCAPED_UNICODE),
            'response' => $request->getMethod() == 'GET' && $response->getStatusCode() == 200 ? "" : $response->getContent(),
            'note' => $note,
            'company_id' => $user != null ? $user->company_id : 0,
            'created_by' => $user != null ? $user->id : 0,
        ]);
    }


}
