<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use DB;

class RequestTransaction
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        DB::beginTransaction();
        $response = $next($request);
        if ($response->getStatusCode() == 500) {
            DB::rollBack();
        } else {
            DB::commit();
        }

        return $response;
    }
}
