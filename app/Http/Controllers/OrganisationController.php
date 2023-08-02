<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Organisation;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Organization;
use Helper;
use Illuminate\Support\Facades\Validator;

class OrganisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $mb_union_region = Helper::getList("mb_union_regions");
        $profile_countries = Helper::getList("profile_country");
        if ($request->isMethod('post')) {
            $search_text = $request->get('query');
            echo $country = $request->get('country');
            $institute = $request->get('institute');
            $order_by = $request->get('order_by');
            $request->session()->put('search.organization.country', $country);
            $request->session()->put('search.organization.query', $search_text);
            $request->session()->put('search.organization.institute', $institute);
            $request->session()->put('search.organization.order_by', $order_by);


        }else{
            $country = $request->session()->get('search.organization.country');
            $search_text = $request->session()->get('search.organization.query');
            $institute = $request->session()->get('search.organization.institute');
            $order_by = $request->session()->get('search.organization.order_by');



            if ($country != NULL && $search_text != NULL && $institute != NULL) {
                return redirect('organisations.show');

            }
        }

        $organization = Organization::limit(1);



        if ($search_text !== null) :
            $organization->leftjoin('global_parameters.profile_country', 'identity.organizations.billing_country', "=", "global_parameters.profile_country.id")
                ->where('account_name', 'LIKE', '%' . $search_text . "%")
                ->orWhere('cautions', 'LIKE', '%' . $search_text . "%")
                ->orWhere('description', 'LIKE', '%' . $search_text . "%")
                ->orWhere('billing_state', 'LIKE', '%' . $search_text . "%")
                ->orWhere('billing_city', 'LIKE', '%' . $search_text . "%")
                ->orWhere('global_parameters.profile_country.label_eng', '%' . $search_text . "%");

        endif;

        if ($country !== null) :
            $organization->orWhere('billing_country', '=', trim($country));
        endif;
        if ($institute !== null) :
            $organization->orWhere('institute', '=', $institute);
        endif;
        if ($order_by !== null) :
            $organization->orderBy("account_name", $order_by);
        endif;
        $search_data = $organization->paginate(10);

        return view('organisations.show', [
            'organization' => $search_data,
            'mb_union_regions' => $mb_union_region,
            'profile_countries' => $profile_countries,
            
        ]);

//        $mb_union_region = Organization::paginate(10);
//
//        return view('organisations.show', [
//            'organizations' => $organization
//        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'account_name' => 'required',
            'phone' => 'required',
            'billing_state' => 'required',
            'billing_city' => 'required',
            'billing_postal_code' => 'required',

        ]);
        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            //dd($request);
            if (!empty($request->input('id'))) {
                $organisation = Organization::find($request->input('id'));

                if ($organisation) {
                    $organisation->account_name = $request->input('account_name');
                    $organisation->phone = $request->input('phone');
                    $organisation->ceo = $request->input('ceo');
                    $organisation->type = $request->input('type');
                    $organisation->website = $request->input('website');
                    $organisation->geographic_area_of_nterest = $request->input('geographic_area_of_nterest');
                    $organisation->cautions = $request->input('cautions');
                    $organisation->description = $request->input('description');
                    $organisation->primary_contact = $request->input('primary_contact');
                    $organisation->common_area_of_interest = $request->input('common_area_of_interest');
                    $organisation->billing_country = $request->input('billing_country');
                    $organisation->billing_state = $request->input('billing_state');
                    $organisation->billing_street = $request->input('billing_street');
                    $organisation->billing_city = $request->input('billing_city');
                    $organisation->billing_state = $request->input('billing_state');
                    $organisation->billing_postal_code = $request->input('billing_postal_code');

                    $query = $organisation->update();

                    if (!$query) {
                        return response()->json(['status' => 0, 'msg' => 'Something went wrong']);
                    } else {
                        return response()->json(['status' => 1, 'msg' => 'Item updated']);
                    }
                }
            }

            $organisation = new Organization();
            $organisation->account_name = $request->input('account_name');
            $organisation->phone = $request->input('phone');
            $organisation->ceo = $request->input('ceo');
            $organisation->type = $request->input('type');
            $organisation->website = $request->input('website');
            $organisation->geographic_area_of_nterest = $request->input('geographic_area_of_nterest');
            $organisation->cautions = $request->input('cautions');
            $organisation->description = $request->input('description');
            $organisation->primary_contact = $request->input('primary_contact');
            $organisation->common_area_of_interest = $request->input('common_area_of_interest');
            $organisation->billing_country = $request->input('billing_country');
            $organisation->billing_state = $request->input('billing_state');
            $organisation->billing_street = $request->input('billing_street');
            $organisation->billing_city = $request->input('billing_city');
            $organisation->billing_state = $request->input('billing_state');
            $organisation->billing_postal_code = $request->input('billing_postal_code');

            $query = $organisation->save();

            if (!$query) {
                return response()->json(['status' => 0, 'msg' => 'Something went wrong']);
            } else {
                return response()->json(['status' => 1, 'msg' => 'New Item added']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
    public function show(Organisation $organisation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     *
     */
    public function edit($id)
    {
        $profile_countries = Helper::getList("profile_country");
        $mb_union_regions = Helper::getList("mb_union_regions");
        $organization = Organization::where('id', $id)->first();
      
        return view('organisations.edit',['organization' => $organization,
                                          'profile_countries' => $profile_countries,
                                          'mb_union_regions' => $mb_union_regions,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organisation $organisation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organisation $organisation)
    {
        //
    }

    public function ajaxDataLoad(Request $request)
    {
        $data = [];
        // $page=$request->page;
        if ($request->page) {
            $page = $request->page;
        } else {
            $page = $request->page;
            $page = 1;
        }
        if ($request->has('q')) {
            $search = $request->q;
            $data = Organization::select("id", "account_name")
                ->where('account_name', 'LIKE', "%$search%")
                ->limit($page * 10)
                ->get()->toArray();
            $total = Organization::select("id", "account_name")
                ->where('account_name', 'LIKE', "%$search%")
                ->get()->count();
        }
        $count = count($data);

        $data_array = array(

            'total_count' => $total,
            'incomplete_results' => false,
            'items' => $data,
            'page' => $page,
        );


        return response()->json($data_array);
  
    }
    public function organisation_update(Request $request){
  
        $request->validate([
            'phone' => 'required',
            'account_name' => 'required',
            'ceo' => 'required',
            'type' => 'required',
            'website' => 'required',
            'mb_union_region' => 'required',
            'cautions' => 'required',
            'description' => 'required',
            'primary_contact' => 'required',
            'common_area_of_interest' => 'required',
             'billing_state' => 'required',
            'billing_city' => 'required',
            'billing_country' => 'required',
            'billing_postal_code' => 'required',
          ]);
          $organization = Organization::where('id', $request->organization_id)->update([

            'phone' => $request->phone,
            'account_name' => $request->account_name,
            'ceo' => $request->ceo,
            'type' => $request->type,
            'website' => $request->website,
            'geographic_area_of_interest' => $request->mb_union_region,
            'cautions' => $request->cautions,
            'description' => $request->description,
            'primary_contact' => $request->primary_contact,
            'common_area_of_interest' => $request->common_area_of_interest,
            'billing_state' => $request->billing_state,
            'billing_city' => $request->billing_city,
            'billing_country' => $request->billing_country,
            'billing_postal_code' => $request->billing_postal_code,
         

        ]);
          return response()->json('The update has been successfully');
    }
    public function organisation_validate(Request $request){

       
        if ($request->input_name == 'phone') {

            $validater_input = [$request->input_name => 'required'];
        }
      
        if ($request->input_name == 'account_name') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'ceo') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'type') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'website') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'mb_union_region') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'cautions') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'description') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'primary_contact') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'common_area_of_interest') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'country') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'billing_city') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'billing_country') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'billing_postal_code') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'billing_state') {

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
}
