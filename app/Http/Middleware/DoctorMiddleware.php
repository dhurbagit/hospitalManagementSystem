<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DoctorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        /** @var App\Models\User */
        $users = Auth::user();

        if ($users) {
            // Check if the user has roles 
            if ($users->hasRole(['doctor'])) {
                // dd('doctorMiddleware');
                return $next($request);
            }
        } else {
            return redirect()->route('login');
        }
        abort(403);
    }
}
