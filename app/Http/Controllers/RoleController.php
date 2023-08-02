<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Role;
use http\Env\Response;
use Illuminate\Http\Request;
//use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;
use DB;

class RoleController extends Controller
{


    public function index()
    {
    }

    /**
     * Display the specified resource.
     *
     */
    public function show()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        $roles =
            Role::with('permissions')->get();
        $permissions =
            Permission::with('permissions')->get();
        return view('user.permission.user-roles', ['roles' => $roles, 'permissions' => $permissions]);
    }

    public function roles(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'guard_name' => 'required',
        ]);
        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $role = new Role();
            $role->name = $request->name;
            $role->guard_name = $request->guard_name;
            $query = $role->save();

            $listPermissions = explode(',', $request->role_has_permissions);

            foreach ($listPermissions as $permission) {
                $permissions = new Permission();
                $role->permissions()->attach($permissions->id);
                $role->save();
            }

            if (!$query) {
                return response()->json(['status' => 0, 'msg' => 'Something went wrong']);
            } else {
                $roles = Role::all();
                return response()->json($role);
            }
        }
    }


    //create the edit in the display userpage
    public function edit($id)
    {

        $roles = Role::find($id); //find the id
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
    }


    //    //update the data in the database
    //    public function update(Request $request, $id)
    //    {
    //
    //        $roles = Role::find($id); //find the id
    //
    //        $roles->name = $request->input('name'); //input name
    //        $roles->guard_name = $request->input('guard_name'); //input description
    //
    //
    //        $roles->save(); //save the updated data
    //
    //        if (!$roles) {
    //            return response()->json(['status' => 0, 'msg' => 'Something went wrong']);
    //        } else {
    //            return response()->json(['status' => 1, 'msg' => 'Updated Successful']);
    //        }
    //    }

    public function update(Request $request, $id)
    {
        $roles = Role::find($id); //find the id
        $roles->name = request('name');
        $roles->guard_name = request('guard_name');

        $roles->update();

        $roles->syncPermissions($request->input('permission'));

        if (!$roles) {
            return response()->json(['status' => 0, 'msg' => 'Something went wrong']);
        } else {
            return response()->json(['status' => 1, 'msg' => 'Updated Successful']);
        }
    }

    public function delete($id)
    {

        $roles = Role::find($id); //find the id
        $roles->delete(); //call the delete function


        return redirect('/user-roles')->with('roles', $roles);
    }
}
