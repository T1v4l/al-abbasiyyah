<?php

namespace App\Http\Middleware;

use App\Models\User; // <-- 1. PASTIKAN BARIS INI ADA
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $role
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // 2. Kita gunakan $request->user() yang lebih modern dan jelas
        // Tipe kembaliannya lebih mudah dipahami oleh editor
        $user = $request->user();

        // 3. Logika pengecekan yang lebih aman
        if (! $user || ! ($user instanceof User) || $user->role !== $role) {
            abort(403); 
        }

        return $next($request);
    }
}