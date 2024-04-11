<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Appoinment;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Schedule;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $approvedAppoinment = Appoinment::where('status', 'approved')->get();
        $departments =  Department::all();
        return view('frontend.index', compact('departments', 'approvedAppoinment'));
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
        // dd($request->all());
         $input = $request->all();
        $patient = Patient::create($input);
        
        $input['patient_id'] = $patient->id;
        $input['status'] = 'Pending';
        Appoinment::create($input);

        return redirect()->route('home.index')->with('message', 'appoinment sucessfully send.');


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

    public function getDoctor($id){
         $doctor = Doctor::where('dept_id', $id)->get();
        return response()->json($doctor);
    
    }
    public function getSchedule($id){
      
       $appoinment = Appoinment::get();
      
       $rec = [];
       foreach($appoinment as $data){
        if($data->status == 'approved'){
            $rec[] = $data->schedule_id;
        }
       }

        $schedule = Schedule::where('doctor_id', $id)
        ->whereNotIn('id', $rec)
        ->get();
       
        return response()->json($schedule);
    
    }
}
