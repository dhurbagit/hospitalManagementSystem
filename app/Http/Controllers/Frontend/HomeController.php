<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Schedule;
use App\Models\Appoinment;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

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

        $data = [
            'name' => 'John Doe',
        ];

        $user['to'] = $request->email;

        Mail::send('frontend.emailform', $data, function ($message) use ($user) {

            $message->to($user['to']);

            $message->subject('Subject');
        });


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

    public function getDoctor($id)
    {
        $doctor = Doctor::where('dept_id', $id)->get();
        return response()->json($doctor);
    }
    public function getSchedule(Request $request, $id)
    {

        $timeIntervals = Schedule::where('doctor_id', $id)->get();
        $appoinmentTime = Appoinment::where('doctor_id', $id)->get();
        $timeGapArrays = []; // Initialize the array to store time gaps
        
        foreach ($timeIntervals as $interval) {
            $fromTimeObj = Carbon::parse($interval->from_time);
            $toTimeObj = Carbon::parse($interval->to_time);
            $schedule_id = $interval->id;
            $date = $interval->date;
        
            $timeGapArray = [];
            while ($fromTimeObj < $toTimeObj) {
                $endTimeSlot = $fromTimeObj->copy()->addMinutes(30); // Use a fixed 30-minute interval
        
                $excludeTime = false; // Flag to exclude this time slot
        
                // Check if this time slot matches any of the exit times
                foreach ($appoinmentTime as $appointment) {
                    $appointmentTime = Carbon::parse($appointment->time_range);
                    
                    // Exclude exit time based on appointment status
                    if ($fromTimeObj->format('H:i') === $appointmentTime->format('H:i')) {
                        if ($appointment->status === 'approved' || $appointment->status === 'pending') {
                            $excludeTime = true;
                            break; // Exit the loop once a match is found
                        }
                    }
                }
        
                // If the time slot should not be excluded, add it to the gap array
                if (!$excludeTime) {
                    $timeGapArray[] = [
                        'start_time' => $fromTimeObj->format('H:i'),
                        'end_time' => $endTimeSlot->format('H:i'),
                        'schedule_id' => $schedule_id,
                        'date' => $date,
                    ];
                }
        
                $fromTimeObj = $endTimeSlot; // Move to the next interval
            }
        
            if (!empty($timeGapArray)) {
                $timeGapArrays[] = $timeGapArray;
            }
        }
         
        return response()->json($timeGapArrays);
    }
      
}
