<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


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
            // return redirect('dashboard');
            $user = Auth::user();
           
            if ($user->roles->name == 'admin') {
             
                return redirect('dashboard');
            }
            elseif ($user->roles->name == 'doctor'){
               
                return redirect('doctor-dashboard');
            }
            else{
                abort(419, 'Sorry wrong authentication');
            }

             
        } else {
            return redirect('login')->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }

        // ->onlyInput('email')
    }
    public function loginCheck(){
       
        if (Auth::check()) {
            $user = Auth::user();
    
            // Check the user's role or any other criteria
            if ($user->roles->name == 'admin') {
             
                return redirect('dashboard');
            }
            elseif ($user->roles->name == 'doctor'){
               
                return redirect('doctorDashboard');
            }
            else{
                return view('login.index');
            }
        }
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
