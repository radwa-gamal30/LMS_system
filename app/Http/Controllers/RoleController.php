<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;

class RoleController extends Controller
{
        public function index()
        {
            $roles = Role::with('permissions')->get();
            return response()->json([
                'status' => 'success',
                'roles' => $roles
            ]);
        }
    
        public function store(RoleRequest $request)
        {
           $data= $request->validated();
    
            $role = Role::create(['name' => $data['name']]);
    
            if ($request->has('permissions')) {
                $role->givePermissionTo($request->permissions);
            }
    
            return response()->json([
                'status' => 'success',
                'message' => 'Role created successfully',
                'role' => $role->load('permissions')
            ]);
        }
    
        public function update(RoleRequest $request, Role $role)
        {
            $data= $request->validated();
            $role->syncPermissions($data['permissions']);
    
            return response()->json([
                'status' => 'success',
                'message' => 'Permissions updated successfully',
                'role' => $role->load('permissions')
            ]);
        }
        public function destroy(Role $role)
        {
            $role->permissions()->detach();
            $role->users()->detach();
            //delete role
            $role->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Role deleted successfully'
            ]);
        }
}
