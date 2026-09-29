<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    /**
     * Guests are sent to the admin login page.
     * Authenticated non-admins get a 403 — they can never enter the panel.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user()) {
            return redirect()->route('admin.login');
        }

        if (! $request->user()->is_admin) {
            abort(403, 'You are not authorized to access the admin panel.');
        }

        return $next($request);
    }
}
