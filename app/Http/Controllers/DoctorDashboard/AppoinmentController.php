<?php

namespace App\Http\Controllers\DoctorDashboard;

use App\Http\Controllers\Controller;
use App\Models\Appoinment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppoinmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        
        $user = Auth::user();
    //    dd($user);
        $doctor = Doctor::where('user_id', $user->id)->first();
        $appoinment =  Appoinment::where('doctor_id', $doctor->id)->get();
        // dd($appoinment);
        return view('doctorDashboard.appoinment.index', compact('appoinment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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

    public function status(Request $request){
        // dd($request->all());
        $input['status'] = $request->status;
        $update = Appoinment::find($request->id);
        $update->update($input);
        return 'successfully updated';
    }
}
