<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$status): Response
    {
        try {
            // Coba mendapatkan peran pengguna saat ini
            $userstatus = Auth::guard('admin')->user()->status;

            if (!in_array($userstatus, $status)) {
                throw new \Exception('Unauthorized access');
            } else {
                return $next($request);
            }
        } catch (\Exception $e) {
            return response()->view('auth.auth', ['error' => $e->getMessage()], 403);
            throw $e;
        }
    }
}
