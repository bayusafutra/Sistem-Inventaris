<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();
        Log::info('CheckRole Middleware', ['user_id' => $user->id, 'roleuser' => $user->roleuser, 'allowed_roles' => $roles]);

        $userRole = $user->roleuser;

        if (!in_array((int)$userRole, array_map('intval', $roles))) {
            Log::warning('Access Denied', ['user_role' => $userRole, 'required_roles' => $roles]);
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}
