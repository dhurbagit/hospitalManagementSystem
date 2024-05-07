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
    protected $doctor;
    public function __construct(Doctor $doctor)
    {
        $this->doctor = $doctor;
        
    }


    public function index()
    {

        $user_id = Auth::user();
        


        $doctorId = Doctor::where('user_id', $user_id->id)->first();
        $list = Schedule::where('doctor_id', $doctorId->id)->orderBy('id', 'DESC')->paginate(5);
        $appointments = Appoinment::where('doctor_id', $doctorId->id)->get();

        $timeIntervals = [];

        foreach ($list as $schedule) {
            $startDate = Carbon::parse($schedule->date)->format('Y-m-d');
            $startTime = Carbon::parse($startDate . ' ' . $schedule->from_time);
            $endTime = Carbon::parse($startDate . ' ' . $schedule->to_time);
            $interval = 30; // Interval in minutes

            $currentTime = clone $startTime;

            while ($currentTime->addMinutes($interval)->lte($endTime)) {
                $status = ''; // Default status

                // Compare the current time interval with appointments
                foreach ($appointments as $appointment) {
                    [$appointmentStartTime, $appointmentEndTime] = explode('-', $appointment->time_range);
                    $appointmentStartTime = Carbon::parse($startDate . ' ' . $appointmentStartTime);
                    $appointmentEndTime = Carbon::parse($startDate . ' ' . $appointmentEndTime);

                    if ($currentTime->between($appointmentStartTime, $appointmentEndTime)) {
                        $status = $appointment->status;
                        break; // No need to continue checking once a match is found
                    }
                }

                $timeIntervals[] = [
                    'date' => $startDate,
                    'start' => $currentTime->clone()->subMinutes($interval)->format('H:i'),
                    'end' => $currentTime->format('H:i'),
                    'status' => $status, // Include appointment status
                    'schedule_id' => $schedule->id, // Include schedule ID if needed
                ];
            }
        }

        // dd($timeIntervals);


        return view('doctorDashboard.schedule.index', compact('timeIntervals', 'list'));
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
