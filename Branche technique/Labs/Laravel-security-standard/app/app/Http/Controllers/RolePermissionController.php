<?php

// app/Http/Controllers/RolePermissionController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionController extends Controller
{
   
   

    public function showRolePermission($id)
    {
        $user = User::findOrFail($id);

        $userRole = $user->roles;

        $userPermissions = $user->permissions()->pluck('id')->toArray(); 
        $roles = Role::pluck('name','id');
        
        $permissions = Permission::pluck('name', 'id');

        return view('roleAndPermission', compact('userRole', 'roles', 'permissions', 'userPermissions', 'user'));
    }

    public function assignRolePermission(Request $request)
    {

        $user = User::where('name', $request->input('user'))->first();
        $removeAssignRoles = false;
        $removeAssignPermissions = false;

        if ($user) {
            $role = Role::find($request->input('role'));
            $permissions = Permission::find($request->input('permissions', []));

            if ($role) {
                $user->assignRole($role);
            } else {
                $removeAssignRoles = $user->syncRoles([]);
            }

            if ($permissions) {
                $user->syncPermissions($permissions);
            } else {
                $removeAssignPermissions = $user->syncPermissions([]);
            }

            if ($removeAssignRoles) {
                return back()->with('success', 'Role removed successfully.');
            }elseif($removeAssignPermissions){
                return back()->with('success', 'Permission removed successfully.');
            }elseif($removeAssignRoles && $removeAssignPermissions){
                return back()->with('success', 'Role and permission removed successfully.');
            }

            return back()->with('success', 'Role and permission assigned successfully.');
        } else {
            return back()>with('error', 'User not found.');
        }
    }

}