<?php

namespace App\Http\Controllers\DoctorDashboard;

use Carbon\Carbon;
use App\Models\Doctor;
use App\Models\Schedule;
use App\Models\Appoinment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DoctorScheduleController extends Controller
{
    //

    public function index()
    {
        $user_id = Auth::user();
        $doctorData = Doctor::where('user_id', $user_id->id)->first();
        $list = Schedule::where('doctor_id', $doctorData->id)->with('appoinment')->get();
         

        //    dd($appoinment);
        return view('doctorDashboard.schedule.index', compact('list'));
    }

    public function create()
    {
        return view('doctorDashboard.schedule.form');
    }
    public function store(Request $request)
    {


        $doctor_id = Auth::user();


        $startTime = Carbon::createFromFormat('H:i', $request->from_time); // Example start time (9:00 AM)
        $endTime = Carbon::createFromFormat('H:i', $request->to_time); // Example end time (5:00 PM)
        $interval = 30; // Gap between appointments in minutes
        $appointments = [];


        while ($startTime < $endTime) {
            $endTimeSlot = $startTime->copy()->addMinutes($interval);
            $appointments[] = [
                'start_time' => $startTime->format('H:i'),
                'end_time' => $endTimeSlot->format('H:i'),
            ];
            $startTime = $endTimeSlot;
        }
        $doctorId = Doctor::where('user_id', $doctor_id->id)->first();
        foreach ($appointments as $key => $value) {

            Schedule::create([
                'doctor_id' =>  $doctorId->id,
                'from_time' => $value['start_time'],
                'to_time' => $value['end_time'],
                'date' => $request->date,

            ]);
        }
      
        return redirect()->route('DoctorSchedule.index')->with('message', 'successfully added.');
    }
    public function edit($id)
    {
        $schedule = Schedule::find($id);
        return view('doctorDashboard.schedule.form', compact('schedule'));
    }
    public function update(Request $request, $id)
    {
 
        $input  =  $request->all();
        $updateSchedule = Schedule::find($id);
        $updateSchedule->update($input);


        return redirect()->route('DoctorSchedule.index')->with('message', 'successfully added.');
    }
    public function destroy($id)
    {

        $deleteId = Schedule::find($id);
        $deleteId->delete();
        return redirect()->route('DoctorSchedule.index')->with('message', 'schedule Deleted.');
    }
}
