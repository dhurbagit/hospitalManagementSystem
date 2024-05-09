<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
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
            // Check if the user has roles, and if they do not have the 'doctor' role
            if ($users->hasRole(['doctor'])) {
                return redirect()->route('mainDoctorDashboard');
            }
            else{
                // dd($next($request));
                 
                return $next($request);
            }
        } else {
            return redirect()->route('login');
        }
        abort(403);
    }
}
