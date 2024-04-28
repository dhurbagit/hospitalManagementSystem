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
        $doctorInfo = Doctor::where('user_id', $getUserId->id)->first();
        // dd($doctorInfo);

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
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        // dd('edit');
        $sessionId = Auth::user();

        $editDoctor = Doctor::findOrFail($id);

        $getProvinceId = $editDoctor->province_id;
        $getProvinceDetail = Province::find($getProvinceId);
        $getDistrictList = $getProvinceDetail->districts ?? [];

        $getdistictId = $editDoctor->district_id;
        $getDistrictDetail = District::find($getdistictId);
        $getMunicipality = $getDistrictDetail->municipality ?? [];


        $editDoctorEducation = DoctorEducation::where('doctor_id', $id)->get();
        // dd($editDoctorEducation);
        $editDoctorExperience = DoctorExperience::where('doctor_id', $id)->get();
        $editUserDetail = User::find($sessionId->id);


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
         
         
        $userId = Auth::user();
        $doctor = Doctor::find($id);

        $input = $request->all();
        

        if ($request->hasFile('image')) {
            $input['image'] = $request->file('image')->store('doctorImage', 'uploads');
        }
        $doctor->update($input);
        DoctorEducation::where('doctor_id', $id)->delete();
        foreach ($request->institute_name as $key => $value) {
            DoctorEducation::create([
                'institute_name' => $request->institute_name[$key],
                'medical_degree' => $request->medical_degree[$key],
                'graduation_year_bs' => $request->graduation_year_bs[$key],
                'graduation_year_ad' => $request->graduation_year_ad[$key],
                'specialization' => $request->specialization[$key],
                'doctor_id' => $id,
            ]);
        }
    
        
        DoctorExperience::where('doctor_id', $id)->delete();
        foreach($request->organization_name as $key => $value){
            DoctorExperience::create([
                'organization_name' => $request->organization_name[$key],
                'start_date_bs' => $request->start_date_bs[$key],
                'start_date_ad' => $request->start_date_ad[$key],
                'end_date_bs' => $request->end_date_bs[$key],
                'end_date_ad' => $request->end_date_ad[$key],
                'description' => $request->description[$key],
                'doctor_id' => $id
            ]);
        }


        $user = User::find($userId->id);
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

    public function getProvince_d()
    {
        $provinces = DB::table('provinces')->get();
        return response()->json($provinces);
    }
    public function getDistrict_d($id)
    {
        $districts = DB::table('districts')->where('province_id', $id)->get();
        return response()->json($districts);
    }
    public function getMunicipality_d($id)
    {
        $municipality = DB::table('municipalities')->where('districts_id', $id)->get();
        return response()->json($municipality);
    }

    public function deleteDoctorEducation(Request $request){
        DoctorEducation::find($request->id)->delete();
        return 'successfully delete';
    }
    public function deleteDoctorExperience(Request $request){
        DoctorExperience::find($request->id)->delete();
        return 'successfully delete';
    }

}
