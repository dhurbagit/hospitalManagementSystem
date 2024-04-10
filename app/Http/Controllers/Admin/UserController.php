<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $userList = User::orderBy('id', 'DESC')->get();
        return view('user.index', compact('userList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $roles = Role::all();
        return view('user.form', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input['name'] = $request->name;
        $input['email'] = $request->email;
        $input['password'] = Hash::make($request->password);
        $input['role_id'] = $request->role_id;

        User::create($input);

        return redirect()->route('users.index')->with('message', 'Successfully added New User');
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
        $roles = Role::all();
        $user =  User::findOrFail($id);
        return view('user.form', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $updateUser = User::find($id);
        
        $input = $request->all();
        if($input['password'] == null)unset($input['password']);
        
        $updateUser->update($input);
        return redirect()->route('users.index')->with('message', 'Successfully Updated User');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteUser = User::findOrFail($id);
        $deleteUser->delete();
        return redirect()->route('users.index')->with('message', 'Successfully deleted User');
    }
}
