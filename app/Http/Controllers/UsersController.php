<?php

namespace App\Http\Controllers;

use App\Models\Role;


use App\Models\User;
use App\Models\Users;
use App\Models\Organisation;
use App\Models\Model_has_role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Helper;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $users = User::limit(10)->get();

        return view('user.user-form', [
            'users' => $users
        ]);
    }

    public function logout()
    {
        return view('user.user-logout');
    }
    /**
     * Display a search of the resource.
     *
     */
    public function search(Request $request)
    {
        return view('user.search');
    }

    /**
     * if the method is post get variable details and then store that details
     * else retrieve the details through session and if the search fields are not not null return the search form
     * if the method is get, get the details according to the search query
     * if the request search details are not null display details accordingly
     *
     *
     */
    public function list(Request $request)
    {
        if ($request->isMethod('post')) {
            $search_text = $request->get('query');
            echo $country = $request->get('country');
            $institution = $request->get('institution');
            $order_by = $request->get('order_by');
            $request->session()->put('search.form.country', $country);
            $request->session()->put('search.form.query', $search_text);
            $request->session()->put('search.form.institution', $institution);
            $request->session()->put('search.form.order_by', $order_by);
            $institution = Organisation::where('id', $institution)->first();
            if ($institution)
                $request->session()->put('search.form.account_name', $institution->account_name);

            //   echo     $search->toSql();
            //  exit();

        }else{
            $country = $request->session()->get('search.form.country');
            $search_text = $request->session()->get('search.form.query');
            $institution = $request->session()->get('search.form.institution');
            $order_by = $request->session()->get('search.form.order_by');



            if ($country != NULL && $search_text != NULL && $institution != NULL) {
                return redirect('user.search');
            }
        }

        $search = User::limit(1);

        if ($search_text !== null) :
            $search->leftjoin('global_parameters.profile_country', 'identity.users.country', "=", "global_parameters.profile_country.id")
                ->select('users.*','users.id as user_id','profile_country.*')
                ->where('surname', 'LIKE', '%' . $search_text . "%")
                ->orWhere('first_name', 'LIKE', '%' . $search_text . "%")
                ->orWhere('second_name', 'LIKE', '%' . $search_text . "%")
                ->orWhere('email', 'LIKE', '%' . $search_text . "%")
                ->orWhere('institution', 'LIKE', '%' . $search_text . "%")
                ->orWhere('global_parameters.profile_country.label_eng', '%' . $search_text . "%");


        endif;

        if ($country !== null) :
            $search->orWhere('country', '=', trim($country));
        endif;
        if ($institution !== null) :
            $search->orWhere('institution', '=', $institution);
        endif;
        if ($order_by !== null) :
            $search->orderBy("first_name", $order_by);
        endif;
        $search_data = $search->paginate(5);

        return view('user.list', [
            'search' => $search_data
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     */
    public function create(Request $request)
    {
        $user =  User::where('id', $request->id)->first();
        $profile_qualifications = Helper::getList("profile_qualification");
        $profile_organisation_types = Helper::getList("profile_organisation_type");
        $profile_countries = Helper::getList("profile_country");
        $profile_languages = Helper::getList("profile_language");
        $profile_phone_codes = Helper::getList("profile_phone_code");
        // $user_status = Helper::getList("user_status");
        $profile_titles = Helper::getList("profile_title");
        $profile_origins = Helper::getList("profile_origin");
        $mb_union_regions = Helper::getList("mb_union_regions");
        $profile_job_category= Helper::getList("profile_job_category");
        $roles = Role::all();

        $user = (object)[
            "id" => '',
            "merge_id" => '',
            "title" => '',
            "surname" => '',
            "first_name" => '',
            "second_name" => '',
            "qualification" => '',
            "gender" => '',
            "date_of_birth" => '',
            "job_title" => '',
            "job_category" => '',
            "institution" => '',
            "department" => '',
            "type_of_institution" => '',
            "address_line1" => '',
            "address_line2" => '',
            "address_line3" => '',
            "po_code" => '',
            "city" => '',
            "state" => '',
            "country" => '',
            "nationality" => '',
            "fax" => '',
            "telephone" => '',
            "telephone_country_code" => '',
            "fax_country_code" => '',
            "mobile_country_code" => '',
            "mobile" => '',
            "subscribe" => '',
            "email" => '',
            "email_test" => '',
            "alternative_email" => '',
            "old_password" => '',
            "marketing_opt" => '',
            "language" => '',
            "group_sponsor" => '',
            "heard_about" => '',
            "origin" => '',
            "li_id" => '',
            "fb_id" => '',
            "gg_id" => '',
            "az_id" => '',
            "stripe_id" => '',
            "status" => 'PENDING',
            "last_update" => '',
            "last_login" => '',
            "date_created" => '',
            "pwd_reset_token_creation_date" => '',
            "email_verified_at" => '',
            "token" => '',
            "operator_id" => '',
            "sync_flag" => 0,
            "type_of_institution_other" => '',
            "job_category_other" => '',
            "deceased" => '',
            "msgraph_gid" => '',
            "image" => '',
            "updated_at" => '',
            "created_at" => ''
        ];
        return view('user.user-profile', [
            'profile_titles' => $profile_titles,'profile_job_category' => $profile_job_category,
            'roles' => $roles,'mb_union_regions'=>$mb_union_regions,
            'profile_qualifications' => $profile_qualifications,
            'profile_organisation_types' => $profile_organisation_types, 'profile_countries' => $profile_countries, 'profile_languages' => $profile_languages,
            'profile_phone_codes' => $profile_phone_codes, 'user' => $user,'profile_origins' => $profile_origins
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        if($request->input('save_type_as') == 1){
            $validator = \Validator::make($request->all(), [

                'surname' => 'required',
                'first_name' => 'required',
                'email' => 'required|email|max:255',
                'city' => 'required',
                'address_line1' => 'required',
                'telephone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'telephone_country_code' => 'required',
                'language' => 'required',
                'status' => 'required',
                'origin' => 'required',
                'country' => 'required',
            ]);

            if (!$validator->passes()) {
                return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);

            }
        }

        /*--------------------------------  roles save -----------------------------------*/
            if($request->input('role')){
                $roles=$request->input('role');
                foreach($roles as $role_id){
                    if(!Model_has_role::where('role_id', $role_id)->where('model_id', $request->input('id'))->exists()){
                        $role=new Model_has_role();
                        $role->role_id=$role_id;
                        $role->model_type='App\Models\User';
                        $role->model_id =$request->input('id');
                        $role->save();
                    }
                }
            }
            /*-------------------------------------  roles save -/-----------------------------------*/
            /**------------------------organisation data------------------------------------------- */
            $account_name=NULL;

            if(!empty($request->input('organisation_id'))){
                $organisation=Organisation::where('id',$request->input('organisation_id'))->first('account_name');
                $account_name=$organisation->account_name;
            }

            /**-----------------------------organisation data-/------------------------------------- */

            if (!empty($request->input('id'))) {
                $user = User::find($request->input('id'));
                if ($user) {
                    $user->title = $request->input('title');
                    $user->surname = $request->input('surname');
                    $user->first_name = $request->input('first_name');
                    $user->second_name = $request->input('second_name');
                    $user->qualification = $request->input('qualification');
                    $user->job_title = $request->input('job_title');
                    $user->job_category = $request->input('job_category');
                    $user->institution = $account_name;
                    $user->organisation_id = $request->input('organisation_id');
                    $user->department = $request->input('department');
                    $user->email = $request->input('email');
                    $user->alternative_email = $request->input('alternative_email');
                    $user->city = $request->input('city');
                    $user->address_line1 = $request->input('address_line1');
                    $user->address_line2 = $request->input('address_line2');
                    $user->address_line3 = $request->input('address_line3');
                    $user->po_code = $request->input('po_code');
                    $user->state = $request->input('state');
                    $user->country = $request->input('country');
                    $user->telephone = $request->input('telephone');
                    $user->telephone_country_code = $request->input('telephone_country_code');
                    $user->status = $request->input('status');
                    $user->origin = $request->input('origin');
                    $user->heard_about = $request->input('heard_about');
                    $user->type_of_institution = $request->input('type_of_institution');
                    $user->qualification = $request->input('qualification');
                    $user->language = $request->input('language');
                    $user->marketing_opt = $request->input('marketing_opt');
                    $user->deceased = $request->input('deceased');
                    $query = $user->update();
                    /*----------------------comment save--------------------- */
                    if($request->input('comment')){
                        $table = new Global_comment();
                        $table->content = $request->input('comment');
                        $table->ref_id = $request->input('id');
                        $table->author_id = Auth::user()->id;
                        $table->comment_type = 'User';
                        $table->status = '1';
                        $table->save();
                    }
                      /*----------------------comment save-/-------------------- */

                    if ($query) {
                        return response()->json(['status' => 1, 'msg' => 'Updated Successfully']);
                    } else {
                        return response()->json(['status' => 0, 'msg' => 'Something went wrong']);
                    }
                }
            } else {
                $user = new User;
                $user->title = $request->input('title');
                $user->surname = $request->input('surname');
                $user->first_name = $request->input('first_name');
                $user->second_name = $request->input('second_name');
                $user->qualification = $request->input('qualification');
                $user->job_title = $request->input('job_title');
                $user->job_category = $request->input('job_category');
                $user->institution = $account_name;
                $user->organisation_id = $request->input('organisation_id');
                $user->department = $request->input('department');
                $user->email = $request->input('email');
                $user->alternative_email = $request->input('alternative_email');
                $user->city = $request->input('city');
                $user->address_line1 = $request->input('address_line1');
                $user->address_line2 = $request->input('address_line2');
                $user->address_line3 = $request->input('address_line3');
                $user->po_code = $request->input('po_code');
                $user->state = $request->input('state');
                $user->country = $request->input('country');
                $user->telephone = $request->input('telephone');
                $user->telephone_country_code = $request->input('telephone_country_code');
                $user->status = $request->input('status');
                $user->origin = $request->input('origin');
                $user->heard_about = $request->input('heard_about');
                $user->type_of_institution = $request->input('type_of_institution');
                $user->qualification = $request->input('qualification');
                $user->language = $request->input('language');
                $user->marketing_opt = $request->input('marketing_opt');
                $user->deceased = $request->input('deceased');

                $query = $user->update();
                /*----------------------comment save--------------------- */
                if($request->input('comment')){
                    $table = new Global_comment();
                    $table->content = $request->input('comment');
                    $table->ref_id = $user->id;
                    $table->author_id = Auth::user()->id;
                    $table->comment_type = 'User';
                    $table->status = '1';
                    $table->save();
                }
                /*--------------------------- comment save-?--------------------------- */
                if (!$query) {
                    return response()->json(['status' => 0, 'msg' => 'Something went wrong']);
                } else {
                    return response()->json(['status' => 1, 'msg' => 'New user added']);
                }
            }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        $profile_titles = Helper::getList("profile_title");
        $profile_qualifications = Helper::getList("profile_qualification");
        $profile_organisation_types = Helper::getList("profile_organisation_type");
        $profile_countries = Helper::getList("profile_country");
        $profile_languages = Helper::getList("profile_language");
        $profile_phone_codes = Helper::getList("profile_phone_code");
        // $user_status = Helper::getList("user_status");
        $mb_union_regions = Helper::getList("mb_union_regions");
        $profile_job_category= Helper::getList("profile_job_category");
        if ($id) {
            $user =  User::where('id', $id)->first();
        } else {
            $user = (object)[
                "id" => '',
                "merge_id" => '',
                "title" => '',
                "surname" => '',
                "first_name" => '',
                "second_name" => '',
                "qualification" => '',
                "gender" => '',
                "date_of_birth" => '',
                "job_title" => '',
                "job_category" => '',
                "institution" => '',
                "department" => '',
                "type_of_institution" => '',
                "address_line1" => '',
                "address_line2" => '',
                "address_line3" => '',
                "po_code" => '',
                "city" => '',
                "state" => '',
                "country" => '',
                "nationality" => '',
                "fax" => '',
                "telephone" => '',
                "telephone_country_code" => '',
                "fax_country_code" => '',
                "mobile_country_code" => '',
                "mobile" => '',
                "subscribe" => '',
                "email" => '',
                "email_test" => '',
                "alternative_email" => '',
                "old_password" => '',
                "marketing_opt" => '',
                "language" => '',
                "group_sponsor" => '',
                "heard_about" => '',
                "origin" => '',
                "li_id" => '',
                "fb_id" => '',
                "gg_id" => '',
                "az_id" => '',
                "stripe_id" => '',
                "status" => 'PENDING',
                "last_update" => '',
                "last_login" => '',
                "date_created" => '',
                "pwd_reset_token_creation_date" => '',
                "email_verified_at" => '',
                "token" => '',
                "operator_id" => '',
                "sync_flag" => 0,
                "type_of_institution_other" => '',
                "job_category_other" => '',
                "deceased" => '',
                "image" => '',
                "msgraph_gid" => '',
                "updated_at" => '',
                "created_at" => ''
            ];
        }


        $profile_origins = Helper::getList("profile_origin");
        $roles = Role::all();

        return view('user.user-profile', [
            'profile_titles' => $profile_titles, 'profile_job_category' => $profile_job_category,
            'roles' => $roles,'mb_union_regions'=>$mb_union_regions,
            'profile_qualifications' => $profile_qualifications,
            'profile_organisation_types' => $profile_organisation_types, 'profile_countries' => $profile_countries, 'profile_languages' => $profile_languages,
            'profile_phone_codes' => $profile_phone_codes, 'user' => $user, 'profile_origins' => $profile_origins
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Users $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Request $request)
    {
        $user_id = $request->user_id;
        $query = User::find($user_id)->delete();

        if ($query) {
            return response()->json(['status' => 1, 'msg' => 'Deleted Successfully']);
        } else {
            return response()->json(['status' => 0, 'msg' => 'Something went wrong']);
        }
    }

    //update profile picture
    public function updateimage(Request $request)
    {
        $path = 'app-assets/uploads/user/';
        $file = $request->file('admin_image');
        $new_name = 'UIMG_' . date('Ymd') . uniqid() . '.jpg';

        //upload new image
        $upload = $file->move(public_path($path), $new_name);

        if (!$upload) {
            return response()->json(['status' => 0, 'msg' => 'Something went wrong, upload new picture failed']);
        } else {
            $oldPicture = User::find(Auth::user()->id)->getAttributes()['image'];

            if ($oldPicture != '') {
                if (\File::exists(\public_path($path . $oldPicture))) {
                    \File::delete(\public_path($path . $oldPicture));
                }
            }
            //update DB
            $update = User::find(Auth::user()->id)->update(['image' => $new_name]);

            if (!$upload) {
                return response()->json(['status' => 0, 'msg' => 'Something went wrong, updating picture in db failed']);
            } else {
                return response()->json(['status' => 1, 'msg' => 'Picture has been updated successfully']);
            }
        }
    }
    public function user_profile_validate(Request $request){


        if ($request->input_name == 'title') {

            $validater_input = [$request->input_name => 'required'];
        }

        if ($request->input_name == 'surname') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'first_name') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'second_name') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'qualification') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'job_title') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'specialization') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'institution') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'department') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'type_of_institution') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'email') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'alternative_email') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'city') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'address1') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'address_line2') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'address_line3') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'po_code') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'state') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'country') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'telephone_country_code') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'telephone') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'telephone_country_code') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'language') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'status') {

            $validater_input = [$request->input_name => 'required'];
        }

        $validator = Validator::make($request->all(), $validater_input);

        if ($validator->fails()) {
            //pass validator errors as errors object for ajax response

            return response()->json(['errors' => $validator->errors()]);
        }

        if ($validator->passes()) {
            $name = $request->input_name;

            return response()->json(['success' => $name]);
        }

        return response()->json(['error' => $validator->errors()->all()]);

    }

    public function savedata(Request $request)
    {
        $uid = $request->uid;
        $sub_scientific_section = $request->sub_scientific_section;
        print_r($sub_scientific_section);
        $working_groups = $request->working_groups;
        print_r($working_groups);
        $union_region = $request->union_region;
        print_r($union_region);
        $scientific_section = $request->scientific_section;
        print_r($scientific_section);
        /**ARRAY TO STRING */

        $working_groups_str = '';
        if (is_array($working_groups)) :
            $working_groups_str = implode("|", $working_groups);

        endif;
        print_r($working_groups_str);


        $sub_scientific_section_str = '';
        if (is_array($working_groups)) :
            $sub_scientific_section_str = implode("|", $sub_scientific_section);

        endif;
        print_r($sub_scientific_section_str);


        $working_groups_str->save();
    }
}
