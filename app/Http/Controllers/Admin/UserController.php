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
        $userList = User::orderBy('id', 'DESC')->paginate(5);
        return view('user.index', compact('userList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        

        $roles = Role::pluck('name','name')->all();
        
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
    $input['role_id'] = '1'; // This line is not needed for role assignment

    $user = User::create($input);

    // Assuming roles are stored as an array in the request (e.g., roles[0], roles[1], ...)
    $user->syncRoles($request->roles);

    return redirect()->route('users.index')->with('message', 'Successfully added New User with roles');
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
    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'name')->all();
        $selectedRole = $user->roles->pluck('name','name')->all();

        return view('user.form', compact('user', 'roles', 'selectedRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // dd($request->all());
        $input = $request->all();
        if($input['password'] == null)unset($input['password']);
        
        $user->update($input);
        $user->syncRoles($request->roles);
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
