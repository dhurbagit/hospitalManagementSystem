<?php

namespace App\Http\Controllers\Roleandpermission;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::get();
        return view('role-permission.role.index', compact('roles'));
    }
    public function create()
    {

        return view('role-permission.role.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name'
            ],
        ]);
        Role::create([
            'name' => $request->name,
        ]);
        return redirect('role')->with('message', 'Role created successfully!');
    }
    public function edit(Role $role)
    {

        return view('role-permission.role.edit', compact('role'));
    }
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name,' . $role->id
            ],
        ]);
        $role->update([
            'name' => $request->name,
        ]);
        return redirect('role')->with('message', 'Role update successfully!');
    }
    public function destroy($roleId)
    {
        $role = Role::find($roleId);
        $role->delete();
        return redirect('role')->with('message', 'Role Deleted successfully!');
    }

    public function addPermissionToRole($roleId) {
        $permissions = Permission::get();
        $role = Role::findOrFail($roleId);
        $rolePermission = DB::table('role_has_permissions')
        ->where('role_has_permissions.role_id', $role->id)
        ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
        ->all();
        return view('role-permission.role.add-permission', compact('role', 'permissions', 'rolePermission'));
    }
    public function givePermissionToRole(Request $request, $roleId){

        $request->validate([
            'permission' => 'required',
        ]);
        $role = Role::findOrFail($roleId);
        $role->syncPermissions($request->permission);
        return redirect()->back()->with('message', 'permission added to role');
    }
}
