<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckScope
{
    public function handle(Request $request, Closure $next, $scope)
    {
        $user = $request->user();

        // Jika Anda menyimpan scope di token atau user, sesuaikan bagian ini
        // Contoh: scope disimpan di kolom 'scopes' pada tabel users (array/JSON)
        if (!$user || !in_array($scope, $user->scopes ?? [])) {
            return response()->json(['message' => 'Unauthorized. Scope missing.'], 403);
        }

        return $next($request);
    }
}
