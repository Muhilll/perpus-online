<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\anggota;

class CheckAnggota
{
    public function handle(Request $request, Closure $next)
    {
        $id_user = session('id_user');
        $anggota = anggota::where('id_user', $id_user)->first();

        if ($anggota) {
            $isAnggota = true;
        } else{
            $isAnggota = false;
        }

        view()->share('isAnggota', $isAnggota);

        return $next($request);
    }
}
