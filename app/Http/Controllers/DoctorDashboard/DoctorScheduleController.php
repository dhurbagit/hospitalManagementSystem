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
        $list = Schedule::where('doctor_id', $doctorData->id)->orderBy('id', 'DESC')->paginate(1);


        return view('doctorDashboard.schedule.index', compact('list'));
    }


    public function create()
    {
        return view('doctorDashboard.schedule.form');
    }
    public function store(Request $request)
    {
        $doctor_id = Auth::user();

        $input = $request->all();
        $doctorId = Doctor::where('user_id', $doctor_id->id)->first();
        $input['doctor_id'] = $doctorId->id;
        Schedule::create($input);

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
