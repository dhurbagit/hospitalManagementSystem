<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use Exception;

class DepartmentController extends Controller
{
    protected $department;
   

    public function __construct(Department $department)
    {
        $this->department = $department;
        $this->middleware('permission:delete role', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $list = Department::orderBy('id', 'DESC')->paginate(5);
        return view('departments.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('departments.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $request)
    {
        //

        try {
            $input = $request->all();
            Department::create($input);
            return redirect()->route('department.index')->with('message', 'New department created succesfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
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
        $showList = Department::findOrFail($id);
        return view('departments.form', compact('showList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $updateData = Department::find($id);
            $input = $request->all();
            $updateData->update($input);
            return redirect()->route('department.index')->with('message', 'Department Updated succesfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $deleteData = Department::findOrFail($id);
        $deleteData->delete();
        return redirect()->back()->with('message', 'Department Deleted succesfully');
    }
    public function trashfile()
    {

        $trashfile = Department::onlyTrashed()->get();
        return view('departments.thrashList', compact('trashfile'));
    }
    public function restoretrashfile($id)
    {
        $restoreFile = Department::withTrashed()->find($id);
        $restoreFile->restore();
        return redirect()->back()->with('message', 'file restored.');
    }

    public function trashPermanentDelete($id)
    {
        try{

        
        $forecDelte = Department::withTrashed()->find($id);
        $forecDelte->forceDelete();
        return redirect()->back()->with('message', 'file Deleted.');
        }
        catch(\Exception $e){
            return redirect()->back()->with('message', $e->getMessage());
        }
    }
}
