<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function permissions(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'guard_name' => 'required',
        ]);
        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $permission = new Permission();
            $permission->name = $request->name;
            $permission->guard_name = $request->guard_name;
            $query = $permission->save();


            if (!$query) {
                return response()->json(['status' => 0, 'msg' => 'Something went wrong']);
            } else {
                $permission = Permission::all();
                return response()->json($permission);
            }
        }
    }

    public function show_permission()
    {
        $permissions = Permission::all();

        $permissions =
            Permission::with('permissions')->get();
        return view('user.permission.user-roles', ['permissions' => $permissions]);
    }

    public function findPermission(Request $request)
    {
        $permission = DB::table('permissions')
            ->select('id')
            ->where('name', $request->get('name')) // here is the change
            ->first();
        return response()->json($permission);
    }

    public function edit($id)
    {

        $permissions = Permission::find($id); //find the id


    }

    public function update(Request $request, $id)
    {
        $permission = Permission::find($id); //find the id
        $permission->name = request('permission-name');
        $permission->guard_name = request('permission-guard-name');
        $permission->save();


        if (!$permission) {
            return response()->json(['status' => 0, 'msg' => 'Something went wrong', 'permission' => $permission]);
        } else {
            return response()->json(['status' => 1, 'msg' => 'Updated Successful', 'permission' => $permission]);
        }
    }

    public function delete($id)
    {

        $permission = Permission::find($id); //find the id
        $permission->delete(); //call the delete function


        return redirect('/user-roles')->with('permissions', $permission);
    }
}
