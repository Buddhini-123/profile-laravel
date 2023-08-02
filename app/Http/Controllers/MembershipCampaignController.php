<?php
namespace App\Http\Controllers;

use App\Models\Beneficiary;
use App\Models\Campaign;
use App\Models\Membership;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Helper;
use DB;

class MembershipCampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create(Request $request)
    {
        $campaigns = Campaign::where('id', $request->id)->first();
        $mb_category = Helper::getList("mb_category");
        $campaign_reference =  DB::table('membership.membership_campaign')
            ->select('reference')
            ->get();

        $campaigns =(object)[
            "id" => "",
            "reference" => "",
        "course_id" => "",
        "campaign_year" => "",
        "title_eng" => "",
        "title_fre" => "",
        "title_spa" => "",
        "description_eng" => "",
        "description_fre" => "",
        "description_spa" => "",
        "service" => "",
        "category_excluded" => "",
        "category_included" => "",
        "promotion_rate" => "",
        "button_eng" => "",
        "button_fre" => "",
        "button_spa" => "",
        "promotion_years" => "",
        "promotion_category" => "",
        "promotion_url" => "",
        "promotion_email" => "",
        "last_update" => "",
        "date_creation" => "",
        "display" => "",
        "campaign_start_date" => "",
        "campaign_end_date" => "",
        "ini_operator" => ""
            ];

        return view('membershipCampaign.edit', ['campaigns' => $campaigns,'mb_category' => $mb_category,'campaign_reference' => $campaign_reference]);
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'reference' => 'required',
            'campaign_year' => 'required|integer',
            'title_eng' => 'required',
            'description_eng' => 'required',
            'service' => 'required',
            'category_excluded' => 'required',
            'promotion_rate' => 'required|integer',
            'promotion_years' => 'required|integer',
            'button_eng' => 'required',
            'promotion_category' => 'required',
            'promotion_url' => 'required',
            'promotion_email' => 'required|email',
            'display' => 'required',

        ]);
        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            //dd($request);
            if (!empty($request->input('id'))) {
                $campaigns = Campaign::find($request->input('id'));
                //dd($beneficiary_data);

                if ($campaigns) {
                    $campaigns->reference = $request->input('reference');
                    $campaigns->course_id = $request->input('course_id');
                    $campaigns->campaign_year = $request->input('campaign_year');
                    $campaigns->title_eng = $request->input('title_eng');
                    $campaigns->title_fre = $request->input('title_eng');
                    $campaigns->title_spa = $request->input('title_eng');
                    $campaigns->description_eng = $request->input('description_eng');
                    $campaigns->description_fre = $request->input('description_eng');
                    $campaigns->description_spa = $request->input('description_eng');
                    $campaigns->service = $request->input('service');
                    $campaigns->category_excluded = $request->input('category_excluded');
                    $campaigns->category_included = $request->input('category_included');
                    $campaigns->promotion_rate = $request->input('promotion_rate');
                    $campaigns->button_eng = $request->input('button_eng');
                    $campaigns->button_fre = $request->input('button_eng');
                    $campaigns->button_spa = $request->input('button_eng');
                    $campaigns->promotion_years = $request->input('promotion_years');
                    $campaigns->promotion_category = $request->input('promotion_category');
                    $campaigns->promotion_url = $request->input('promotion_url');
                    $campaigns->promotion_email = $request->input('promotion_email');
                    $campaigns->last_update = $request->input('last_update');
                    $campaigns->date_creation = $request->input('date_creation');
                    $campaigns->display = $request->input('display');
                    $campaigns->campaign_start_date = $request->input('campaign_start_date');
                    $campaigns->campaign_end_date = $request->input('campaign_end_date');
                    $campaigns->ini_operator = Auth::user()->id;


                    $query = $campaigns->update();

                    if (!$query) {
                        return response()->json(['status' => 0, 'msg' => 'Something went wrong']);
                    } else {
                        return response()->json(['status' => 1, 'msg' => 'Item updated']);
                    }
                }
            }

            $campaigns = new Campaign();
            $campaigns->reference = $request->input('reference');
            $campaigns->course_id = $request->input('course_id');
            $campaigns->campaign_year = $request->input('campaign_year');
            $campaigns->title_eng = $request->input('title_eng');
            $campaigns->title_fre = $request->input('title_fre');
            $campaigns->title_spa = $request->input('title_spa');
            $campaigns->description_eng = $request->input('description_eng');
            $campaigns->description_fre = $request->input('description_fre');
            $campaigns->description_spa = $request->input('description_spa');
            $campaigns->service = $request->input('service');
            $campaigns->category_excluded = $request->input('category_excluded');
            $campaigns->category_included = $request->input('category_included');
            $campaigns->promotion_rate = $request->input('promotion_rate');
            $campaigns->button_eng = $request->input('button_eng');
            $campaigns->button_fre = $request->input('button_fre');
            $campaigns->button_spa = $request->input('button_spa');
            $campaigns->promotion_years = $request->input('promotion_years');
            $campaigns->promotion_category = $request->input('promotion_category');
            $campaigns->promotion_url = $request->input('promotion_url');
            $campaigns->promotion_email = $request->input('promotion_email');
            $campaigns->last_update = $request->input('last_update');
            $campaigns->date_creation = $request->input('date_creation');
            $campaigns->display = $request->input('display');
            $campaigns->campaign_start_date = $request->input('campaign_start_date');
            $campaigns->campaign_end_date = $request->input('campaign_end_date');
            $campaigns->ini_operator = Auth::user()->id;

            $query = $campaigns->save();

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
     */
    public function show(Beneficiary $beneficiary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        $mb_category = Helper::getList("mb_category");
        $campaigns = Campaign::where('id', $id)->first();
        $campaign_reference =  DB::table('membership.membership_campaign')
            ->select('reference')
            ->get();

        return view('membershipCampaign.edit', ['campaigns' => $campaigns,'mb_category' => $mb_category,'campaign_reference' => $campaign_reference
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, MembershipCampaign $membershipCampaign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(MembershipCampaign $membershipCampaign)
    {
        //
    }
}
