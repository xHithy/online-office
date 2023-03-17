<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class VerifyUser
{
    public function handle(Request $request, Closure $next): Response|RedirectResponse
    {
        $session = session('user');
        if(!$session) {
            // Redirect to the landing page if there is no session found
            return redirect(route('landing'));
        }
        return $next($request);
    }
}
