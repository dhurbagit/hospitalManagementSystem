<?php

namespace App\Http\Controllers\DoctorDashboard;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appoinment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Notifications\UserFollowNotification;

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
        $appoinment =  Appoinment::where('doctor_id', $doctor->id)->paginate(5);
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

    public function status(Request $request)
    {
        $auth = Auth::user();
        $admin = User::where('role_id', 1)->first(); // Assuming role_id 1 is for admin

        if ($auth && $admin) {
            $input['status'] = $request->status;
            $update = Appoinment::find($request->id);

            if ($update) {
                $oldStatus = $update->status; // Store the old status for comparison
                $update->update($input);

                // Fetch patient details
                $patient = Patient::find($update->patient_id);

                $data = array_merge($patient->toArray(),$update->toArray());
                 
                $user['to'] = $patient->email;

                Mail::send('frontend.patientEmailtemplate', $data, function ($message) use ($user) {

                    $message->to($user['to']);

                    $message->subject('Subject');
                });

                // Check if the status has changed to 'approved' or 'cancel'
                if (in_array($input['status'], ['approved', 'cancel']) && $input['status'] !== $oldStatus && $patient) {
                    // Send notification to admin with authenticated user's name, patient name, and status
                    $admin->notify(new UserFollowNotification($auth->name, $patient->fullname, $input['status']));
                }

                return 'Successfully updated and notification sent to admin.';
            } else {
                return 'Appointment not found.';
            }
        } else {
            return 'User not authenticated or admin not found.';
        }
    }

    public function markAsRead($id)
    {
        $notification = Auth::user()->notifications()->where('id', $id)->first();

        if ($notification) {
            $notification->markAsRead();
            return redirect()->back();
        } else {
            return 'Notification not found or you are not authorized to mark it as read.';
        }
    }
}
