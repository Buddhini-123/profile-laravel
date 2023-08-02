<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Membership;
use App\Models\Organization;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Helper;
use DB;

class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        
    }

    public function membership(Request $request)
    {

        //dd($request->id);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $uid = Membership::find($request->id);
        print_r($uid);
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
        if (is_array($sub_scientific_section)) :
            $sub_scientific_section_str = implode("|", $sub_scientific_section);

        endif;
        print_r($sub_scientific_section_str);

        $uid->prop_working_groups = $working_groups_str;
        $uid->prop_list_serves = $sub_scientific_section_str;
        //print_r($uid);
        $uid->update();
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'membership_renewal_type' => 'required',
            'quantity_paper_journal' => 'integer',
            'origin' => 'required',
            'validity_status' => 'required',
            'membership_status' => 'required',
            'share_profile_agreed' => 'required',

        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            if (!empty($request->input('membership_id'))) {
                $membership = Membership::find($request->input('membership_id'));
                if ($membership) {

                    $membership->membership_id = $request->input('membership_id');
                    $membership->membership_renewal_type = $request->input('membership_renewal_type');
                    $membership->membership_renewal_category = $request->input('membership_renewal_category');
                    $membership->membership_history = $request->input('membership_history');
                    $membership->skype = $request->input('skype');
                    $membership->about_yourself = $request->input('about_yourself');
                    $membership->quantity_paper_journal = $request->input('quantity_paper_journal');
                    $membership->prop_working_groups = $request->input('prop_working_groups');
                    $membership->reference = $request->input('reference');
                    $membership->origin = $request->input('origin');
                    $membership->renewal_status = $request->input('renewal_status');
                    $membership->validity_status = $request->input('validity_status');
                    $membership->payment_source_tag = $request->input('payment_source_tag');
                    $membership->current_membership_category = $request->input('current_membership_category');
                    $membership->share_profile_agreed = $request->input('share_profile_agreed');
                    $membership->membership_status = $request->input('membership_status');
                    if ($membership->preferred_method_of_contact == 'message') {
                        $membership->preferred_method_of_contact = $request->input('preferred_method_of_contact_message');
                    } elseif ($membership->preferred_method_of_contact == 'email') {
                        $membership->preferred_method_of_contact = $request->input('preferred_method_of_contact_email');
                    } else {
                        $membership->preferred_method_of_contact = $request->input('preferred_method_of_contact');
                    }


                    $query = $membership->update();

                    if ($query) {
                        return response()->json(['status' => 1, 'msg' => 'Updated Successfully']);
                    } else {
                        return response()->json(['status' => 0, 'msg' => 'Something went wrong']);
                    }
                }
            } else {
                $membership = new Membership;
                $user = User::find($request->input('id'));
                $membership->membership_id = $request->input('membership_id');
                $membership->membership_renewal_type = $request->input('membership_renewal_type');
                $membership->membership_renewal_category = $request->input('membership_renewal_category');
                $membership->membership_history = $request->input('membership_history');
                $membership->skype = $request->input('skype');
                $membership->about_yourself = $request->input('about_yourself');
                $membership->quantity_paper_journal = $request->input('quantity_paper_journal');
                $membership->prop_working_groups = $request->input('prop_working_groups');
                $membership->reference = $request->input('reference');
                $membership->origin = $request->input('origin');
                $membership->renewal_status = $request->input('renewal_status');
                $membership->validity_status = $request->input('validity_status');
                $membership->payment_source_tag = $request->input('payment_source_tag');
                $membership->current_membership_category = $request->input('current_membership_category');
                $membership->share_profile_agreed = $request->input('share_profile_agreed');
                $membership->membership_status = $request->input('membership_status');
                $membership->preferred_method_of_contact = $request->input('preferred_method_of_contact');

                $query = $membership->save();

                if (!$query) {
                    return response()->json(['status' => 0, 'msg' => 'Something went wrong']);
                } else {
                    return response()->json(['status' => 1, 'msg' => 'New Membership added']);
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Membership $membership)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request,Membership $membership)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Membership $membership)
    {
        //
    }
    public function organization_data_load(Request $request){
        $data = [];
            // $page=$request->page;
            if( $request->page){
            $page=$request->page;

            }else{
            $page=$request->page;
            $page=1;
            }
        if($request->has('q')){
            $search = $request->q;
            $data =Organization::select("id","account_name")
            		->where('account_name','LIKE',"%$search%")
                    ->limit($page*10)
            		->get()->toArray();
                    $total =Organization::select("id","account_name")
            		->where('account_name','LIKE',"%$search%")
                    ->get()->count();

        }
       $count=count($data);
       
       $data_array= array (
           
            'total_count' => $total,
            'incomplete_results' => false,
            'items' => $data,
            'page' => $page,
        );
          
        
        return response()->json($data_array);
    // $word=$request->q;
    // $organizations=Organization::where('account_name',  'like', "%{$word}%")->get();
    // return response()->json( $organizations);
    }
}
