<?php

namespace App\Http\Controllers\DoctorDashboard;

use App\Models\User;
use App\Models\Doctor;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Models\DoctorEducation;
use App\Models\DoctorExperience;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DoctorControllerD extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getUserId = Auth::user();
        $doctorInfo = Doctor::find($getUserId)->first();
         
       return view('doctorDashboard.view', compact('doctorInfo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        dd('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        dd('store');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        // dd('edit');
        $editDoctor = Doctor::findOrFail($id);
        $getProvinceId = $editDoctor->province_id;
        $getProvinceDetail = Province::find($getProvinceId);
        $getDistrictList = $getProvinceDetail->districts;

        $getdistictId = $editDoctor->district_id;
        $getDistrictDetail = District::find($getdistictId);
        $getMunicipality = $getDistrictDetail->municipality;
        

        $editDoctorEducation = DoctorEducation::where('doctor_id', $id)->first();
        $editDoctorExperience = DoctorExperience::where('doctor_id', $id)->first();
        $editUserDetail = User::where('doctor_id', $id)->first();



        $province = DB::table('provinces')->get();
        $districts = DB::table('districts')->get();
        $municipalities = DB::table('municipalities')->get();
        $countryList = DB::table('countries')->get();
        $departmentList = DB::table('departments')->get();
        return view('doctorDashboard.form', compact(
            'countryList',
            'departmentList',
            'editDoctor',
            'editDoctorEducation',
            'editDoctorExperience',
            'editUserDetail',
            'province',
            'districts',
            'municipalities',
            'getDistrictList',
            'getMunicipality'
        ));


        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
       // dd($request->all());
       $doctor = Doctor::find($id);

       $input = $request->all();
       if($input['password'] == null)unset($input['password']);

       if ($request->hasFile('image')) {
           $input['image'] = $request->file('image')->store('doctorImage', 'uploads');
       }
       $doctor->update($input);

       $doctorEducation = DoctorEducation::where('doctor_id', $doctor->id)->first();
       $doctorEducation->update($input);

       $doctorExperience = DoctorExperience::where('doctor_id', $doctor->id)->first();
       $doctorExperience->update($input);

       $user = User::where('doctor_id', $doctor->id)->first();
       $input['name'] = $request->first_name . ' ' . $request->middle_name . ' ' . $request->last_name;

       $user->update($input);
       return redirect()->route('doctorDashboard.index')->with('message', "Record Updated Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        dd('destroy');

    }

    public function getProvince()
    {
        $provinces = DB::table('provinces')->get();
        return response()->json($provinces);
    }
    public function getDistrict($id)
    {
        $districts = DB::table('districts')->where('province_id', $id)->get();
        return response()->json($districts);
    }
    public function getMunicipality($id)
    {
        $municipality = DB::table('municipalities')->where('districts_id', $id)->get();
        return response()->json($municipality);
    }


}
