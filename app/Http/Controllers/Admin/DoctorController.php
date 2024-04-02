<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('doctor.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $countryList = DB::table('countries')->get();
        $departmentList = DB::table('departments')->get();

        
        return view('doctor.form', compact('countryList'));
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

    public function getProvince(){
        $provinces = DB::table('provinces')->get();
        return response()->json($provinces);
    }
    public function getDistrict($id){
        $districts = DB::table('districts')->where('province_id', $id)->get();
        return response()->json($districts);
    }
    public function getMunicipality($id){
        $municipality = DB::table('municipalities')->where('districts_id', $id)->get();
        return response()->json($municipality);
    }
}
