<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PenghuniMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->has('nama_penghuni')) {
            // $dataadmin = $request->session()->get('nama_admin');
            // var_dump($request->session()->get('nama_admin'));
            return $next($request);
        }else{
            return redirect('penghuni/login')->with('pesanlogin', 'Silakan Anda Log in Dahulu !');
        }
    }
}
