<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Country;
use App\Models\District;
use App\Models\Province;
use App\Models\Department;
use App\Models\Municipality;
use Illuminate\Http\Request;
use App\Models\DoctorEducation;
use App\Models\DoctorExperience;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use Illuminate\Support\Facades\Redirect;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctorList = Doctor::orderBy('id', 'DESC')->paginate(5);

        // dd($doctorList);
        return view('doctor.index', compact('doctorList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $countryList = DB::table('countries')->get();
        $departmentList = DB::table('departments')->get();


        return view('doctor.form', compact('countryList', 'departmentList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DoctorRequest $request)
    {



        DB::beginTransaction();
        // try {
// dd($request->all());
            $input =  $request->all();
            if ($request->hasFile('image')) {
                $input['image'] = $request->file('image')->store('doctorImage', 'uploads');
            }

            $input['name'] = $request->first_name . ' ' . $request->middle_name . ' ' . $request->last_name;
            $input['role_id'] = 2;
            $user = User::create($input);

            $input['user_id'] = $user->id;
            $doctor = Doctor::create($input);



            foreach ($request->institute_name as $key => $value) {

                DoctorEducation::create([
                    'institute_name' => $request->institute_name[$key],
                    'medical_degree' => $request->medical_degree[$key],
                    'graduation_year_bs' => $request->graduation_year_bs[$key],
                    'graduation_year_ad' => $request->graduation_year_ad[$key],
                    'specialization' => $request->specialization[$key],
                    'doctor_id' => $doctor->id,
                ]);
            }
            foreach ($request->organization_name as $key => $value) {
                DoctorExperience::create([
                    'organization_name' => $request->organization_name[$key],
                    'start_date_bs' => $request->start_date_bs[$key],
                    'start_date_ad' => $request->start_date_ad[$key],
                    'end_date_bs' => $request->end_date_bs[$key],
                    'end_date_ad' => $request->end_date_ad[$key],
                    'description' => $request->description[$key],
                    'doctor_id' => $doctor->id,

                ]);
            }

            DB::commit();
            return redirect()->route('doctor.index')->with('message', 'Doctor Record Successfully added');
        // } catch (\Exception $e) {
            DB::rollBack();
            // return redirect()->back()->with('error', $e->getMessage());
        // }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $doctorInfo = Doctor::find($id)->with('DoctorProvince')->first();
        $doctors = Doctor::find($id);
        return view('doctor.view', compact('doctorInfo', 'doctors'));
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
        $getDistrictList = $getProvinceDetail->districts ?? [];

        $getdistictId = $editDoctor->district_id;
        $getDistrictDetail = District::find($getdistictId);
        $getMunicipality = $getDistrictDetail->municipality ?? [];

        $editDoctorEducation = DoctorEducation::where('doctor_id', $id)->get();
        $editDoctorExperience = DoctorExperience::where('doctor_id', $id)->get();
        $userDoctor = $editDoctor->user_id;
         
        $editUserDetail = User::find($userDoctor);

        $province = Province::get();
        $districts = District::get();
        $municipalities = Municipality::get();
        $countryList = Country::all();
        $departmentList = Department::get();


        

         
        return view('doctor.form', compact(
            
            'departmentList',
            'editDoctor',
            'editDoctorEducation',
            'editDoctorExperience',
            'editUserDetail',
            'province',
            'districts',
            'municipalities',
            'getDistrictList',
            'getMunicipality',
            'countryList',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DoctorRequest $request, string $id)
    {
        //
         
        $doctor = Doctor::find($id);

        $input = $request->all();
        if ($input['password'] == null) unset($input['password']);

        if ($request->hasFile('image')) {
            $input['image'] = $request->file('image')->store('doctorImage', 'uploads');
        }
        $doctor->update($input);
 
        DoctorEducation::where('doctor_id', $id)->delete();
        foreach($request->institute_name as $key => $value){
            DoctorEducation::create([
                'institute_name' => $request->institute_name[$key],
                'medical_degree' => $request->medical_degree[$key],
                'graduation_year_bs' => $request->graduation_year_bs[$key],
                'graduation_year_ad' => $request->graduation_year_ad[$key],
                'specialization' => $request->specialization[$key],
                'doctor_id' => $id
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

        $user = User::find($doctor->user_id);
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
        $doctor->delete();

         
        User::find($doctor->user_id)->delete();
        
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

    public function deleteEducation(Request $request){
        
        DoctorEducation::find($request->id)->delete();
        return 'successfully delete';
    }
    public function deleteExperience(Request $request){
        
        DoctorExperience::find($request->id)->delete();
        return 'successfully delete';
    }

}
