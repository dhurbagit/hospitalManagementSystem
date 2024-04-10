<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use App\Models\District;
use App\Models\Doctor;
use App\Models\DoctorEducation;
use App\Models\DoctorExperience;
use App\Models\Province;
use App\Models\User;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctorList = Doctor::orderBy('id', 'DESC')->with('education')->get();
       
        return view('doctor.index', compact('doctorList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departmentList = DB::table('departments')->get();
        $countryList = DB::table('countries')->get();
        $departmentList = DB::table('departments')->get();


        return view('doctor.form', compact('countryList', 'departmentList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DoctorRequest $request)
    {


        // try {
        $input =  $request->all();
        if ($request->hasFile('image')) {
            $input['image'] = $request->file('image')->store('doctorImage', 'uploads');
        }
        

        
        

        $input['name'] = $request->first_name . ' ' . $request->middle_name . ' ' . $request->last_name;
        $input['role_id'] = 2;
        $user = User::create($input);
        $input['user_id'] = $user->id;
        $doctor = Doctor::create($input);
        $input['doctor_id'] = $doctor->id;
        DoctorEducation::create($input);
        DoctorExperience::create($input);
        return redirect()->route('doctor.index')->with('message', 'Doctor Record Successfully added');
        // } catch (\Exception $e) {
        // return redirect()->back()->with('error', $e->getMessage());
        // }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $doctorInfo = Doctor::find($id);
        return view('doctor.view', compact('doctorInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        //
        
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
        return view('doctor.form', compact(
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
        //
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




        return redirect()->route('doctor.index')->with('message', "Record Updated Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doctor = Doctor::find($id);
        DoctorEducation::where('doctor_id', $doctor->id)->delete();
        DoctorExperience::where('doctor_id', $doctor->id)->delete();
        User::where('doctor_id', $doctor->id)->delete();
        $doctor->delete();
        return redirect()->back()->with('message', 'Record Deleted successfully!');
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
