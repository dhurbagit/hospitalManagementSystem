<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function authenticate(Request $request)
    {
        
        // dd($request->all());
        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credential)) {
            return redirect('dashboard');
             

            if($request->has('remember')){
                Cookie::queue('email', $request->email, 1440);
                Cookie::queue('password', $request->password, 1440);
            }
        } else {
            return redirect('login')->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }

        // ->onlyInput('email')
    }

    /**
     * Show the form for creating a new resource.
     */
    public function logout()
    {
        //
        Auth::logout();
        return redirect()->route('login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
