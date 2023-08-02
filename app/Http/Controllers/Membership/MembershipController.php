<?php

namespace App\Http\Controllers\Membership;

use App\Models\Delivery;
use App\Models\Item;
use App\Models\Membership;
use App\Models\Product;
use App\Models\User;
use App\Models\Organization;
use App\Models\Membership_prop_category;
use App\Models\Courses_application;
use App\Models\Membership_invoice;
use App\Models\Global_comment;
use App\Models\Membership_invoice_item;
use Carbon\Carbon;
use Helper;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\Models\Membership_payment;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * 1.Show the form for editing the specified resource.
     * 2.request the id of item_list table
     * 3.get the details according to the id
     */
    public function edit(Request $request)
    {
        $membership_id=$request->id;
        if( !Membership::where('membership_id',$membership_id)->exists()){
            $new_membership=new Membership();
            $new_membership->membership_id=$membership_id;
            $new_membership->save();
        }
        $mb_categories_associate = Helper::getList("mb_category_associate");
        $mb_categories_organization = Helper::getList("mb_category_organization");
        $mb_categories_indivitual = Helper::getList("mb_category_indivitual");
        $mb_scientific_sections = Helper::getList("mb_scientific_section");
        $mb_scientific_sections_NWk = Helper::getList("mb_scientific_section_NWk");
        $type_of_sections = Helper::getList("type_of_sections");
        $membership_renewal_status = Helper::getList("membership_renewal_status");
        $membership_validity_status = Helper::getList("membership_validity_status");
        $membership_paymentt = Helper::getList("membership_paymentt");
        $membership_current_membership = Helper::getList("membership_current_membership");
        $membership_share_profile = Helper::getList("membership_share_profile");
        $membership_status = Helper::getList("membership_status");
        $membership_origin = Helper::getList("membership_origin");
        $memberships = Helper::getList("memberships");
        $mb_union_regions = Helper::getList("mb_union_regions");
        $membership_renewal = Helper::getList("membership_renewal");
        $membership_category = Helper::getList("membership_category");
        $renewal = Helper::getList("renewal");
        $membership_data = Helper::getList("membership_data");
        $profile_country = Helper::getList("profile_country");
        $profile_origin = Helper::getList("profile_origin");
        $mb_category = Helper::getList("mb_category");
        $mb_category_group = Helper::getList("mb_category_group");

        $membership_prop_category=Membership_prop_category::where('membership_id', $membership_id)->get();
        $courses_application=Courses_application::where('user_id', $membership_id)->get();
        if ($membership_id) {
            $user = (object)User::where('id', $membership_id)->first()->toArray();
            $membership_data = Membership::where('membership_id', $membership_id)->first();
            if ($membership_data)
                $membership_data =   (object) $membership_data->toArray();
            else
                $membership_data = (object) [
                    "membership_id" => null,
                    "group_id" => null,
                    "membership_renewal_type" => "",
                    "membership_renewal_category" => "",
                    "membership_history" => "",
                    "membership_category_id" => null,
                    "prop_scientific_section" => "",
                    "prop_working_groups" => "",
                    "prop_list_serves" => "",
                    "membership_end" => null,
                    "union_region" => null,
                    "scientific_section_to_remove" => null,
                    "membership_status" => "Y",
                    "share_profile_agreed" => "U",
                    "origin" => null,
                    "reference" => null,
                    "om_action_count" => null,
                    "quantity_paper_journal" => null,
                    "marketing_opt" => null,
                    "grace_period" => 1,
                    "operator_id" => null,
                    "about_your_interest" => null,
                    "preferred_method_of_contact" => null,
                    "skype" => null,
                    "about_yourself" => null,
                    "vote_weight" => null,
                    "tags" => "1",
                    "validity_status" => null,
                    "renewal_status" => null,
                    "payment_source_tag" => "GENERAL",
                    "yearly_category_tag" => "",
                    "promotion_tag" => null,
                    "current_membership_payment_date" => null,
                    "current_membership_category" => "",
                    "last_membership_category" => "",
                    "membership_category_changed" => null,
                ];



            $delivery_data = Delivery::where('is_default', '=', '1')->where('user_id', $membership_id)->get()->toArray();
            $delivery_address = DB::table('identity.address')->select(['*'])
                ->where('user_id', '=', $membership_id)
                ->get();
        } else {
            $user = (object)[
                "id" => '',

            ];
        }

        $delivery_id = DB::table('identity.address')
            ->select(['id'])
            ->groupBy('id')
            ->get()->toArray();
        $address = DB::table('identity.address')
            ->select(['address'])
            ->groupBy('address')
            ->get()->toArray();
        //dd($address);


        $date = Carbon::now();


        $mb_category_type = Helper::getList("mb_category_type");

        return view('view.user-view', ['renewal' => $renewal,'profile_origin' => $profile_origin,'mb_category' => $mb_category,'mb_category_group' => $mb_category_group,
            'profile_country' => $profile_country, 'delivery_address' => $delivery_address, 'date' => $date,
            'mb_categories_associate' => $mb_categories_associate, 'membership_renewal' => $membership_renewal, 'delivery_data' => $delivery_data,
            'membership_data' => $membership_data, 'mb_union_regions' => $mb_union_regions, 'membership_category' => $membership_category,
            'membership_prop_category'=>$membership_prop_category, 'courses_application'=>$courses_application,
            'mb_category_type' => $mb_category_type, 'type_of_sections' => $type_of_sections,
            'mb_scientific_sections' => $mb_scientific_sections, 'mb_scientific_sections_NWk' => $mb_scientific_sections_NWk,
            'mb_category_organization' => $mb_categories_organization, 'mb_category_indivitual' => $mb_categories_indivitual,
            'membership' => $memberships, 'user' => $user, 'membership_renewal_status' => $membership_renewal_status, 'membership_validity_status' => $membership_validity_status, 'membership_paymentt' => $membership_paymentt,
            'membership_current_membership' => $membership_current_membership, 'membership_share_profile' => $membership_share_profile, 'membership_status' => $membership_status, 'membership_origin' => $membership_origin

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    /**
     * 1.requests the particular id on click on the type
     * 2.Select the details regarded to the type
     */
    public function ajaxGet(Request $request)
    {

        //dd($request->id);
        $product = Product::where('id', $request->id)->get();
        $items = Item::where('product_id', $request->id)->get();
        //dd($items);


        if (!$items) {
            return response()->json(['status' => 0]);
        } else {
            return response()->json($items);
        }
    }
    public function search(Request $request)
    {
        $session_data = null;
        $session_data = session()->get('search.membership');/*------------------------==>get session data -----------------------*/
        $session_transaction_data = session()->get('search.transaction');/*------------------------==>get session data -----------------------*/
        $organizations = Organization::get();/**--------------for add new Organization------------------------------------ */

        $users = User::limit(10)->get();
        $membership = Membership::all();
        $profile_countries = Helper::getList("profile_country");
        $profile_organisation_types = Helper::getList("profile_organisation_type");
        $profile_job_categories = Helper::getList("profile_job_category");
        $mb_category_type = Helper::getList("mb_category_type");
        $mb_category = Helper::getList("mb_category");
        //dd($mb_category);
        $union_department = Helper::getList("union_departments");
        $mb_scientific_sections = Helper::getList("mb_scientific_section");
        $mb_union_region = Helper::getList("mb_union_regions");
        $type_of_sections = Helper::getList("type_of_sections");
        $memberships = Helper::getList("memberships");

        return view('membership.search', [
            'mb_category_type' => $mb_category_type,
            'membership' => $membership,
            'memberships' => $memberships,
            'profile_countries' => $profile_countries,
            'profile_organisation_types' => $profile_organisation_types,
            'profile_job_categories' => $profile_job_categories,
            'mb_category' => $mb_category,
            'union_department' => $union_department,
            'mb_scientific_sections' => $mb_scientific_sections,
            'mb_union_regions' => $mb_union_region,
            'users' => $users,
            'type_of_sections' => $type_of_sections,
            'session_data' => $session_data,
            'organizations' => $organizations,
            'session_transaction_data' => $session_transaction_data,
            
        ]);
    }


    public function list(Request $request){

        // $key = env('STAFF_IDS');

        if ($request->isMethod('post')) {
            $request->session()->put('search.membership', (object)$_POST);
        }

        if (!session()->exists('search.membership')) {
            return redirect('/membership/search');
        }

        $request_data = session()->get('search.membership');

        if ($request_data) {
            $search_data = DB::table('Membership.membership')
                ->select('Identity.users.*', 'Membership.membership.*','Global_parameters.profile_country.*')
                ->join('Identity.users', 'membership.membership_id', '=', 'users.id')
                ->join('Global_parameters.profile_country', 'users.country', '=', 'profile_country.code_ISO');
            /*----------------------Get users data----------------------------------------- */

            if (!empty($request_data->id)) {
                $search_data->where('id', $request_data->id);
            }
            if (!empty($request_data->name)) {
                $name = $request_data->name;
                $search_data->where('first_name', 'LIKE', "%$name%")->orWhere('second_name', 'LIKE', "%$name%");
                // $search_result = $search_data->get();
                // dd($search_result);
            }
            if (!empty($request_data->email)) {
                $email = $request_data->email;
                $search_data->where('email', $email);
            }
            if (!empty($request_data->institute)) {
                $institute = $request_data->institute;
                $search_data->where('institution', $institute);
            }
            if (!empty($request_data->country)) {
                $country = $request_data->country;
                $search_data->where('country', $country);
            }
            if (!empty($request_data->job_title)) {
                $job_title = $request_data->job_title;
                $search_data->where('job_title', $job_title);
            }
            if (!empty($request_data->profile_job_category)) {
                $profile_job_category = $request_data->profile_job_category;
                $search_data->where('job_category', $profile_job_category);
            }
            if (!empty($request_data->type_of_institution)) {
                $type_of_institution = $request_data->type_of_institution;
                $search_data->where('type_of_institution', $type_of_institution);
            }
            if ($request->type_of_institution) {
                $type_of_institution = $request->type_of_institution;
                $search_data->where('type_of_institution', $type_of_institution);
            }
            if (!empty($request_data->world_bank_income_group)) {
                $world_bank_income_group = $request_data->world_bank_income_group;
                $search_data->where(function ($query) use ($world_bank_income_group) {
                    foreach ($world_bank_income_group as $data) {
                        $query->orWhere('world_bank_income_group', $data);
                    }
                });
            }

            /*----------------------Get users data--end--------------------------------------- */
            /*----------------------Get membership data----------------------------------------- */

                if (!empty($request->mb_union_region)) {
                    $mb_union_region = $request->mb_union_region;
                    $search_data->where('union_region', $mb_union_region);
                }
                if (!empty($request_data->mb_category)) {
                    $mb_category = $request_data->mb_category;
                    $search_data->where('membership_category_id', $mb_category);
                }
                if (!empty($request_data->mb_scientific_section)) {
                    $mb_scientific_section = $request_data->mb_scientific_section;
                    $search_data->where('prop_scientific_section', $mb_scientific_section);
                }
                if (!empty($request_data->list_serves)) {
                    $list_serves = $request_data->list_serves;
                    $search_data->where('prop_list_serves', $list_serves);
                }
                if (!empty($request_data->membership_valid_date)) {
                    $membership_valid_date = $request_data->membership_valid_date;
                    $search_data->where('membership_end', $membership_valid_date);/*----------==>recheck----------- */
                }
                if (!empty($request_data->share_profile_agreed)) {
                    $share_profile_agreed = $request_data->share_profile_agreed;
                    $search_data->where('share_profile_agreed', $share_profile_agreed);/*----------==>not work----------- */
                }
                if (!empty($request_data->membership_history)) {
                    $membership_history = $request_data->membership_history;


                    $search_data->where(function ($query) use ($membership_history) {
                        foreach ($membership_history as $year) {
                            $query->orWhere('membership_history', 'LIKE', "%$year%");
                        }
                    });
                }
                if (!empty($request_data->validity_status)) {
                    $validity_status = $request_data->validity_status;
                    $search_data->where(function ($query) use ($validity_status) {
                        foreach ($validity_status as $val_status) {
                            $query->orWhere('validity_status', 'LIKE', "%$val_status%");
                        }
                    });
                }
                if (!empty($request_data->membership_status)) {
                    $membership_status = $request_data->membership_status;
                    $search_data->where(function ($query) use ($membership_status) {
                        foreach ($membership_status as $mb_status) {
                            $query->orWhere('membership_status', 'LIKE', "%$mb_status%");
                        }
                    });
                }

                if (!empty($request_data->sort_key_1)) {
                    $sort_key_1 = $request_data->sort_key_1;
                    $sort_type_1 = $request_data->sort_type_1;
                    $search_data->orderBy($sort_key_1, $sort_type_1);
                }
                if (!empty($request_data->sort_key_2)) {
                    $sort_key_2 = $request_data->sort_key_2;
                    $sort_type_2 = $request_data->sort_type_2;
                    $search_data->orderBy($sort_key_2, $sort_type_2);
                }

                // print_r($search_data->toSql());
                $search_result = $search_data->paginate(2);
                $total_pages = $search_result->lastPage();
                $total_result_count = $search_result->total();
                $membership_prop_categories = [];
                /*----------------------Get membership data-end---------------------------------------- */
                if ($total_result_count > 0) {
                    /*--------------------------------get  Membership_prop_category data---------------------------*/
                    foreach ($search_result as $key => $result) {
                        $id[$key] = $result->id;
                    }

                    $membership_prop_categories = Membership_prop_category::whereIn('membership_id', $id)->orderBy('end_date', 'DESC')->get();


                    /*--------------------------------get  Membership_prop_category data-end--------------------------*/
                }

                $membership_payments = Membership_payment::where('membership_id', 25)->get();
                return view('membership.list', [
                    'membership_payments' => $membership_payments,
                    'search_result' => $search_result,
                    'membership_prop_categories' => $membership_prop_categories,
                    'total_pages' => $total_pages,
                    'total_result_count' => $total_result_count,
                ]);
            }
        }



    public function transaction_list_extra(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->session()->put('search.transaction', (object)$_POST);
        }

        if (!session()->exists('search.transaction')) {
            return redirect('/membership/search');
        }

        $request_data = session()->get('search.transaction');

        // $search_data = DB::table('Membership.membership')
        // ->select('Identity.users.*', 'Membership.membership.*','Global_parameters.profile_country.*','membership_payments.*','membership_payments.id as payement_id','membership_invoice.*')
        // ->join('Identity.users', 'membership.membership_id', '=', 'users.id')
        // ->join('Membership.membership_invoice', 'membership.membership_id', '=', 'membership_invoice.membership_id')
        // ->join('Membership.membership_payments', 'membership_invoice.id', '=', 'membership_payments.invoice_id')
        // ->join('Global_parameters.profile_country', 'users.country', '=', 'profile_country.code_ISO');
         $search_data = DB::table('Membership.membership_payments')
        ->select('membership_payments_stripe.*','Identity.users.*', 'Membership.membership.*','Global_parameters.profile_country.*','membership_payments.*','membership_payments.id as payement_id','membership_invoice.*')
        ->join('Membership.membership_invoice', 'membership_payments.invoice_id', '=', 'membership_invoice.id')
        ->join('Membership.membership', 'membership_invoice.membership_id', '=', 'membership.membership_id')
        ->join('Identity.users', 'membership.membership_id', '=', 'users.id')
        ->join('Global_parameters.profile_country', 'users.country', '=', 'profile_country.code_ISO')
        ->join('Membership.membership_payments_stripe', 'membership_invoice.id', '=', 'membership_payments_stripe.invoice_id');
        if ($request_data) {
        if (!empty($request_data->ids)) {
            $ids=explode(",",$request_data->ids);
            $search_data->where(function ($query) use ($ids) {
                foreach ($ids as $data) {
                    $query->orWhere('Membership.membership_id', $data);
                }
            });
        }
        if (!empty($request_data->payment_start_date && $request_data->payment_end_date)) {
            $search_data->whereBetween('transaction_date', [$request_data->payment_start_date, $request_data->payment_end_date]);

        }
        if (!empty($request_data->membership_start)) {
            $search_data->where('Membership_invoice.membership_start', $request_data->membership_start);
        }
        if (!empty($request_data->membership_end)) {
            $search_data->where('Membership_invoice.membership_end', $request_data->membership_end);
        }
        if (!empty($request_data->membership_history)) {
            $membership_history = $request_data->membership_history;
            $search_data->where(function ($query) use ($membership_history) {
                foreach ($membership_history as $data) {
                    $query->orWhere('membership_history', 'LIKE', "%$data%");
                }
            });
        }

        if (!empty($request_data->source_of_operation)) {
            $search_data->where('source_of_operation', $request_data->source_of_operation);
        }
        if (!empty($request_data->invoice_status)) {
            $search_data->where('invoice_status', $request_data->invoice_status);
        }
        if (!empty($request_data->source_reference)) {
            $source_reference = $request_data->source_reference;
            $search_data->where(function ($query) use ($source_reference) {
                foreach ($source_reference as $data) {
                    $query->orWhere('source_reference', $data);
                }
            });
        }

        if (!empty($request_data->brand_of_payment)) {
            $brand_of_payment = $request_data->brand_of_payment;
            $search_data->where(function ($query) use ($brand_of_payment) {
                foreach ($brand_of_payment as $data) {
                    $query->orWhere('brand_of_payment', $data);
                }
            });
        }
        if (!empty($request_data->world_bank_income_group)) {
            $world_bank_income_group = $request_data->world_bank_income_group;
            $search_data->where(function ($query) use ($world_bank_income_group) {
                foreach ($world_bank_income_group as $data) {
                    $query->orWhere('world_bank_income_group', $data);
                }
            });
        }
        if (!empty($request_data->renewal_status)) {
            $search_data->where('renewal_status', $request_data->renewal_status);
        }
        if (!empty($request_data->sortkey && $request_data->sortby )) {
            $search_data->orderBy($request_data->sortkey, $request_data->sortby);
        }


        $search_results=$search_data->get();

        foreach ($search_results as $key => $result) {
            $id[$key] = $result->invoice_id;
        }
        $invoice=[];
        $invoice = Membership_invoice::whereIn('id', $id)->first();

        $deferred_income = $invoice['deferred_income'];
        $deferred_income =  unserialize($deferred_income);


        for ($i = (date('Y') - 15); $i <= (date('Y') + 15); $i++) {
            $csv_array[$invoice['payment_id']][$i] = " " . @$deferred_income[$i];
        }
       //dd($csv_array);
        return view('membership.transaction-list', [  'search_results' => $search_results,

        ]);
        }
    }
    public function transaction_list(Request $request){
        if ($request->isMethod('post')) {
            $request->session()->put('search.transaction', (object)$_POST);
        }

        if (!session()->exists('search.transaction')) {
            return redirect('/membership/search');
        }

        $request_data = session()->get('search.transaction');

         $search_data = DB::table('Membership.membership_payments')
        ->select('membership_payments_stripe.*','Identity.users.*', 'Membership.membership.*','Global_parameters.profile_country.*','membership_payments.*','membership_payments.id as payement_id','membership_invoice.*')
        ->leftjoin('Membership.membership_invoice', 'membership_payments.invoice_id', '=', 'membership_invoice.id')
        ->leftjoin('Membership.membership', 'membership_invoice.membership_id', '=', 'membership.membership_id')
        ->leftjoin('Identity.users', 'membership.membership_id', '=', 'users.id')
        ->leftjoin('Global_parameters.profile_country', 'users.country', '=', 'profile_country.code_ISO')
        ->leftjoin('Membership.membership_payments_stripe', 'membership_invoice.id', '=', 'membership_payments_stripe.invoice_id');
        if ($request_data) {
        if (!empty($request_data->ids)) {
            $ids=explode(",",$request_data->ids);
          
            $search_data->where(function ($query) use ($ids) {
                foreach ($ids as $data) {
                    $query->orWhere('Membership.membership_id', $data);
                }
            });
        }
        if (!empty($request_data->payment_start_date && $request_data->payment_end_date)) {
            $search_data->whereBetween('transaction_date', [$request_data->payment_start_date, $request_data->payment_end_date]);

        }
        if (!empty($request_data->membership_start)) {
            $search_data->where('Membership_invoice.membership_start', $request_data->membership_start);
        }
        if (!empty($request_data->membership_end)) {
            $search_data->where('Membership_invoice.membership_end', $request_data->membership_end);
        }
        if (!empty($request_data->membership_history)) {
            $membership_history = $request_data->membership_history;
            $search_data->where(function ($query) use ($membership_history) {
                foreach ($membership_history as $data) {
                    $query->orWhere('membership_history', 'LIKE', "%$data%");
                }
            });
        }

        if (!empty($request_data->source_of_operation)) {
            $search_data->where('source_of_operation', $request_data->source_of_operation);
        }
        if (!empty($request_data->invoice_status)) {
            $search_data->where('invoice_status', $request_data->invoice_status);
        }
        if (!empty($request_data->source_reference)) {
            $source_reference = $request_data->source_reference;
            $search_data->where(function ($query) use ($source_reference) {
                foreach ($source_reference as $data) {
                    $query->orWhere('source_reference', $data);
                }
            });
        }

        if (!empty($request_data->brand_of_payment)) {
            $brand_of_payment = $request_data->brand_of_payment;
            $search_data->where(function ($query) use ($brand_of_payment) {
                foreach ($brand_of_payment as $data) {
                    $query->orWhere('brand_of_payment', $data);
                }
            });
        }
        if (!empty($request_data->world_bank_income_group)) {
            $world_bank_income_group = $request_data->world_bank_income_group;
            $search_data->where(function ($query) use ($world_bank_income_group) {
                foreach ($world_bank_income_group as $data) {
                    $query->orWhere('world_bank_income_group', $data);
                }
            });
        }
        if (!empty($request_data->renewal_status)) {
            $search_data->where('renewal_status', $request_data->renewal_status);
        }
        if (!empty($request_data->sortkey && $request_data->sortby )) {
            $search_data->orderBy($request_data->sortkey, $request_data->sortby);
        }

        $search_result=$search_data->get()->toArray();
      
       
        if($search_result){
            foreach ($search_result as $key1 =>  $invoices) {
                $invoice = (array) $invoices;
      
                $comments_payments= Global_comment::where('comment_type','Payment')->where('ref_id',$invoice['payment_id'])->get();
                $comments = '';
               
                foreach ($comments_payments as $key => $value) {
                    $comments= $value->content;
                     
                }
                $comments_payments= Global_comment::where('comment_type','Payment')->where('ref_id',$invoice['payment_id'])->get();
            
                $addons=Membership_invoice_item::where('invoice_id',$invoice['payment_id'])->get();
    
                $lb_addons[2] =   "Gift Membership";
                $lb_addons[1] =   "Printed Journal (IJTLD)";
                $lb_addons[3] =  "Make a Donation";
                $a = "";
               
                foreach ($addons as $key => $value) {
                  
                    $a .= $lb_addons[$value->addon_id] . ":" . $value->quantity . " -> " . $value->amount . "\n";
                   
                }
                $csv_array=[];
              
                $csv_array[$invoice['payment_id']]['membership_id'] = $invoice['id'];
                $csv_array[$invoice['payment_id']]['membership_category_id'] = $invoice['membership_category'];
       
                $csv_array[$invoice['payment_id']]['membership_category']  = Helper::getLabel("mb_category",$invoice['membership_category']);
                $csv_array[$invoice['payment_id']]['email'] = trim($invoice['email']);
                $csv_array[$invoice['payment_id']]['profile_institution'] =  $invoice['institution'];
                $csv_array[$invoice['payment_id']]['title'] = $invoice['title'];
                $csv_array[$invoice['payment_id']]['surname'] = ucwords(strtolower($invoice['surname']));
                $csv_array[$invoice['payment_id']]['first_name'] =   ucwords(strtolower($invoice['first_name']));
                $csv_array[$invoice['payment_id']]['second_name'] =   ucwords(strtolower($invoice['second_name']));
               
                $csv_array[$invoice['payment_id']]['country_code'] =  Helper::getLabel("profile_country",$invoice['country_id']);
               
                $region_code=Helper::getLabel("union_region",$invoice['country_id']);
              
                $csv_array[$invoice['payment_id']]['region'] = Helper::getLabel("mb_union_regions",$region_code);
                $csv_array[$invoice['payment_id']]['type_of_membership_opr'] =  ucwords($invoice['type_of_membership_opr']);
    
                $csv_array[$invoice['payment_id']]['number_of_years'] =  $invoice['number_of_years'];
                $csv_array[$invoice['payment_id']]['membership_start'] =  $invoice['membership_start'];
                $csv_array[$invoice['payment_id']]['membership_end'] =  $invoice['membership_end'];
                $csv_array[$invoice['payment_id']]['list_amount'] =  $invoice['list_amount'];
                $csv_array[$invoice['payment_id']]['discount_amount'] = $invoice['discount_amount'];
                // $csv_array[$invoice['payment_id']]['paid_amount'] = $invoice['paid_amount'];???????????????????
                $csv_array[$invoice['payment_id']]['paid_amount'] = $invoice['amount'];
                $csv_array[$invoice['payment_id']]['due_amount'] = $invoice['due_amount'];
    
                $csv_array[$invoice['payment_id']]['addon_amount'] =  $invoice['addon_amount'];
                $csv_array[$invoice['payment_id']]['addons_data'] =  $a;
                $csv_array[$invoice['payment_id']]['membership_amount'] =  $invoice['membership_amount'];
             
    
                $csv_array[$invoice['payment_id']]['payment_status'] = $invoice['payment_status'];
                //  $csv_array[$invoice['payment_id']]['operator_id'] = $invoice['operator_id'];?????????????????????????
                $csv_array[$invoice['payment_id']]['sponsor_id'] = (int) ($invoice['sponsor_id'] != '600600') ? $invoice['sponsor_id'] : 0;
                $csv_array[$invoice['payment_id']]['source_of_operation'] = $invoice['source_of_operation'];
                $csv_array[$invoice['payment_id']]['source_reference'] =  $invoice['source_reference'];
                $csv_array[$invoice['payment_id']]['brand_of_payment'] =  $invoice['brand_of_payment'];
                $csv_array[$invoice['payment_id']]['payment_id'] =  $invoice['payment_id'];
                $csv_array[$invoice['payment_id']]['course_id'] =  $invoice['course_id'];
                // $csv_array[$invoice['payment_id']]['promotion_id'] =  $invoice['promotion_id'];?????????????????????????????????
    
                $csv_array[$invoice['payment_id']]['transaction_date'] =  $invoice['transaction_date'];
    
                $csv_array[$invoice['payment_id']]['cb_transmission_date'] =  $invoice['cb_transmission_date'];
                $csv_array[$invoice['payment_id']]['cb_card_exp_month'] =  $invoice['cb_card_exp_month'];
                $csv_array[$invoice['payment_id']]['cb_card_exp_year'] =  $invoice['cb_card_exp_year'];
                $csv_array[$invoice['payment_id']]['cb_brand'] =  $invoice['cb_brand'];
                $csv_array[$invoice['payment_id']]['reference'] =  $invoice['reference'];
                $csv_array[$invoice['payment_id']]['cb_transaction_id'] =  $invoice['cb_transaction_id'];
                $csv_array[$invoice['payment_id']]['cb_card_fingerprint'] =  $invoice['cb_card_fingerprint'];
                $csv_array[$invoice['payment_id']]['comments_payments'] = ($invoice['source_of_operation'] != 'ONLINE') ? $comments : '';
    
                /********************/
                $csv_array[$invoice['payment_id']]['internal_amount'] = 0;
                $csv_array[$invoice['payment_id']]['net_income'] = 0;
                $csv_array[$invoice['payment_id']]['net_income_per_year'] = 0;
                $csv_array[$invoice['payment_id']]['net_deferred_income_after_paid_year'] = 0;
                $csv_array[$invoice['payment_id']]['net_conference_campaign_amount_2021'] = 0;
                $csv_array[$invoice['payment_id']]['net_conference_campaign_amount_per_year']  = 0;
    
                // / 2020conf /
                if ($invoice['membership_start'] == '2021-10-01') :
                    $csv_array[$invoice['payment_id']]['internal_amount'] = 0;
                    $csv_array[$invoice['payment_id']]['net_income'] = 0;
                    $csv_array[$invoice['payment_id']]['net_income_per_year'] = 0;
                    $csv_array[$invoice['payment_id']]['net_deferred_income_after_paid_year'] = 0;
    
                    $csv_array[$invoice['payment_id']]['net_conference_campaign_amount_2021'] = $invoice['paid_amount'];
                    if ($invoice['number_of_years'] > 0) :
                        $csv_array[$invoice['payment_id']]['net_conference_campaign_amount_per_year'] = $invoice['paid_amount'] / $invoice['number_of_years'];
                    else :
                        $csv_array[$invoice['payment_id']]['net_conference_campaign_amount_per_year'] =  $csv_array[$invoice['payment_id']]['net_conference_campaign_deferred_amount'] = $csv_array[$invoice['payment_id']]['net_conference_campaign_amount_2021'] - @$csv_array[$invoice['payment_id']]['net_conference_campaign_amount_per_year'];
                    endif;
                else :
                    /**internal */
                    if ($invoice['source_reference'] == 'COURSE') :
                        $csv_array[$invoice['payment_id']]['internal_amount'] = $invoice['paid_amount'];
                        $csv_array[$invoice['payment_id']]['net_income'] = 0;
                        $csv_array[$invoice['payment_id']]['net_income_per_year'] = 0;
                        $csv_array[$invoice['payment_id']]['net_deferred_income_after_paid_year'] = 0;
                    elseif ($invoice['source_of_operation'] == 'OFFLINE' || $invoice['source_of_operation'] == 'ONLINE') :
                        $csv_array[$invoice['payment_id']]['internal_amount'] = 0;
                        $csv_array[$invoice['payment_id']]['net_income'] = $invoice['paid_amount'];
    
                        /*per year net*/
                        if ($invoice['number_of_years'] > 0) {
                            $csv_array[$invoice['payment_id']]['net_income_per_year'] = $invoice['paid_amount'] / $invoice['number_of_years'];
                        } else {
                            $csv_array[$invoice['payment_id']]['net_income_per_year'] = 0;
                        }
                        $csv_array[$invoice['payment_id']]['net_deferred_income_after_paid_year'] =  ($invoice['paid_amount'] -    $csv_array[$invoice['payment_id']]['net_income_per_year']);
                    else :
                        $csv_array[$invoice['payment_id']]['internal_amount'] = 0;
                        $csv_array[$invoice['payment_id']]['net_income'] = 0;
                        /*per year net*/
                        $csv_array[$invoice['payment_id']]['net_income_per_year'] = 0;
                        $csv_array[$invoice['payment_id']]['net_deferred_income_after_paid_year'] = 0;
                    endif;
    
    
    
                    $csv_array[$invoice['payment_id']]['net_conference_campaign_amount_2021'] = 0;
                    $csv_array[$invoice['payment_id']]['net_conference_campaign_amount_per_year'] = 0;
                    $csv_array[$invoice['payment_id']]['net_conference_campaign_deferred_amount'] = 0;
                endif;
                /*deferred_income*/
                $deferred_income = $invoice['deferred_income'];
                $deferred_income =  unserialize($deferred_income);
    
    
                for ($i = (date('Y') - 15); $i <= (date('Y') + 15); $i++) {
                    $csv_array[$invoice['payment_id']][$i] = " " . @$deferred_income[$i];
                }
               
                $total_count = count($csv_array);
                // dd($total_items);
            }
        }else{
            $csv_array=[];
        }
            return view('membership.transaction-list', [  'search_results' => $csv_array,'total_count' =>$total_count]);
    }

    }
    public function add_new_organization(Request $request){


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
          if(isset($request->mb_union_region)){
            $mb_union_region_array = $request->mb_union_region;
            $mb_union_region=implode("|",$mb_union_region_array);
          }
          $organization=new Organization();
          $organization->phone = $request->input('phone');
          $organization->account_name = $request->input('account_name');
          $organization->ceo = $request->input('ceo');
          $organization->type = $request->input('type');
          $organization->website = $request->input('website');
          $organization->geographic_area_of_interest = $mb_union_region;
          $organization->cautions = $request->input('cautions');
          $organization->description = $request->input('description');
          $organization->primary_contact = $request->input('primary_contact');
          $organization->common_area_of_interest = $request->input('common_area_of_interest');
          $organization->billing_state = $request->input('billing_state');
          $organization->billing_city = $request->input('billing_city');
          $organization->billing_country = $request->input('billing_country');
          $organization->billing_postal_code = $request->input('billing_postal_code');
          $organization->save();
          return response()->json('sucsess');

    }
    public function load_user_data(Request $request){

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
            $data = User::select("id", "first_name","second_name","email")
                ->where('first_name', 'LIKE', "%$search%")
                ->orWhere('second_name', 'LIKE', "%$search%")
                ->limit($page * 10)
                ->get()->toArray();
            $total = User::select("id", "first_name")
                ->where('first_name', 'LIKE', "%$search%")
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
}
