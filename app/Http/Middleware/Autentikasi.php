<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Autentikasi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header('Authorization');

        // Pastikan token ada dan berformat sesuai dengan yang diharapkan
        if (!$token || !preg_match('/Bearer\s+(.*)$/i', $token, $matches)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $tokenFromLocalStorage = $matches[1]; // Ambil token dari header

        // Lakukan validasi token atau aksi lain yang diperlukan
        // Misalnya, verifikasi token dengan data yang sesuai di server
        // if (!validasiToken($tokenFromLocalStorage)) {
        //     return response()->json(['error' => 'Unauthorized'], 401);
        // }

        // Jika validasi berhasil, lanjutkan ke rute yang diminta
        return $next($request);
    }
}
