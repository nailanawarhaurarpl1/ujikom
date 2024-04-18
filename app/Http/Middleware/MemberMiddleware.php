<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MemberMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() && $request->user()->roles == "member") {
            return $next($request);
        }

        // Jika bukan admin, redirect atau kembalikan respon lainnya
        return redirect('/login-member')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
    }
}
