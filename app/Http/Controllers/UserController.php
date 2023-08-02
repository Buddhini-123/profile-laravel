<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Email;
use App\Models\Membership;
use App\Models\Role;
use App\Models\User;
use http\Env\Response;
use Illuminate\Support\Facades\Auth;
use \Cache;
use Illuminate\Http\Request;
use Helper;
use DB;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * 1.add new user
     * 2.Before adding check validation
     * 3.add user if the validation success and else requests for data
     */
//    public function add(Request $request)
//    {
//        $validator = \Validator::make($request->all(), [
//            'name' => 'required',
//            'username' => 'required',
//            'email' => 'required|email',
//            'role' => 'required',
//            'plan' => 'required',
//        ]);
//        if (!$validator->passes()) {
//            return response()->json(['status' => 0,  $validator->errors()->toArray()]);
//        } else {
//            $user = new User();
//
//            $user->name = $request->name;
//            $user->username = $request->username;
//            $user->email = $request->email;
//            $user->plan = $request->plan;
//            $user->action = $request->action;
//            $query = $user->save();
//
//            $role = new Role();
//            $role->name = $request->role;
//
//            $user->assignRole($role);
//
//            $query = $role->save();
//
//            if (!$query) {
//                return response()->json(['status' => 0, 'msg' => 'Something went wrong']);
//            } else {
//                return response()->json(['status' => 1, 'msg' => 'New user added']);
//            }
//        }
//    }

    /**
     * Display the specified resource.
     *
     */
//    public function listAjax()
//    {
//        $users = Cache::remember("chat-users1", 1440, function () {
//            return User::where('status', 'YES')->limit(1)->get();
//        });
//
//        foreach ($users as $key => $user) {
//
//            $user_array['data'][] = [
//                "responsive_id" => "",
//                "id" => 1,
//                "full_name" => "Galen Slixby",
//                "role" => "Editor",
//                "username" => "gslixby0",
//                "email" => "gslixby0@abc.net.au",
//                "current_plan" => "Enterprise",
//                "status" => 3,
//                "avatar" => ""
//            ];
//        }
//
//
//        return response()->json($user_array);
//    }

    /**
     * Display the specified resource.
     *
     */
//    public function emailView()
//    {
//
//        return view('blade-user.email-view', ['users' => []]);
//    }

    /**
     * 1.request user id
     * 2.assign role to the user
     * 3.edit user details
     * 4.Check for validation
     */
//    public function edit(Request $request)
//    {
//
//        $user = User::where('id', $request->id)->first();
//        //        foreach ($request->role as $key => $role) {
//        //            $save = $user->assignRole($role);
//        //        }
//
//
//        $roles = Role::all();
//        $validator = \Validator::make($request->all(), [
//            'name' => 'required',
//            'username' => 'required',
//            'email' => 'required|email',
//            'role' => 'required',
//            'action' => 'required',
//        ]);
//
//        if (!$validator->passes()) {
//            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
//        } else {
//            $query = User::find(Auth::user()->id)->update([
//                'username' => $request->username,
//                'name' => $request->name,
//                'email' => $request->email,
//                'status' => $request->status,
//                'action' => $request->action,
//
//            ]);
//
//
//            if (!$query) {
//                return response()->json(['status' => 0, 'msg' => 'Something went wrong']);
//            } else {
//                return response()->json(['status' => 1, 'msg' => 'User Details Updated Successfully']);
//            }
//        }
//    }



    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * edit user details
     */
//    public function show_edit()
//    {
//        $user = User::all();
//        $roles = Role::with('permissions')->get();
//
//        return view('blade-user.user-edit', ['users' => $user, 'roles' => $roles]);
//    }

//    public function findRenewal(Request $request)
//    {
//
//        $data = DB::table('global_parameters.mb_category')
//            ->select(['label_eng'])
//            ->where('type_of_membership', '=', $request->id)
//            ->get();
//
//        //dd($request->id);
//        //print_r($data);
//
//        $renewal_type_str = '';
//        if (is_array($data)) :
//            $renewal_type_str = implode("|", $data);
//
//        endif;
//        print_r($renewal_type_str);
//        //print_r(implode("|", $data));
//
//        return response()->json($data);
//    }


//    public function user_form(Request $request)
//    {
//        $users = User::limit(10)->get();
//
//
//        return view('blade-user.user-form', [
//            'users' => $users
//        ]);
//    }

//    public function savedata(Request $request)
//    {
//        $uid = $request->uid;
//        $sub_scientific_section = $request->sub_scientific_section;
//        print_r($sub_scientific_section);
//        $working_groups = $request->working_groups;
//        print_r($working_groups);
//        $union_region = $request->union_region;
//        print_r($union_region);
//        $scientific_section = $request->scientific_section;
//        print_r($scientific_section);
//        /**ARRAY TO STRING */
//
//        $working_groups_str = '';
//        if (is_array($working_groups)) :
//            $working_groups_str = implode("|", $working_groups);
//
//        endif;
//        print_r($working_groups_str);
//
//
//        $sub_scientific_section_str = '';
//        if (is_array($working_groups)) :
//            $sub_scientific_section_str = implode("|", $sub_scientific_section);
//
//        endif;
//        print_r($sub_scientific_section_str);
//    }

}
