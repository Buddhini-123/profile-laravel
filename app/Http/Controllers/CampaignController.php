<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use App\Models\Campaign;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campaign = DB::table('membership.membership_campaign')
            ->select(['*'])
            ->get();

        $campaign_beneficiary_data = DB::table('membership.membership_campaign_beneficiary')
            ->select(['*'])
            ->get();

        return view('campaign.show', ['campaign' => $campaign, 'campaign_beneficiary_data' => $campaign_beneficiary_data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create(Request $request)
    {
        $beneficiary = Beneficiary::where('id', $request->id)->first();

        $beneficiary =(object)[
            "id" => "",
            "reference_campaign" => "",
            "reference_id" => "",
            "email" => "",
            "date_creation" => "",
            "ini_operator" => "",
            "status" => "",
            "date_completed" => "",];

        //dd($item_data);

        return view('campaign/edit', [
            'beneficiary' => $beneficiary

        ]);
    }

    /**
     * 1.Do validation
     * 2.If validation passes check for id in the campaign_beneficiary table
     * 3.If id exists requests details for update and do update
     * 4.else requests details and insert
     *
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'reference_campaign' => 'required',
            'status' => 'required',
            'email' => 'required|email',

        ]);
        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            //dd($request);
            if (!empty($request->input('id'))) {
                $beneficiary_data = Beneficiary::find($request->input('id'));
                //dd($beneficiary_data);

                if ($beneficiary_data) {
                    $beneficiary_data->reference_campaign = $request->input('reference_campaign');
                    $beneficiary_data->email = $request->input('email');
                    $beneficiary_data->ini_operator = Auth::user()->id;
                    $beneficiary_data->status = $request->input('status');

                    $query = $beneficiary_data->update();

                    if (!$query) {
                        return response()->json(['status' => 0, 'msg' => 'Something went wrong']);
                    } else {
                        return response()->json(['status' => 1, 'msg' => 'Item updated']);
                    }
                }
            }

            $beneficiary_data = new Beneficiary();
            $beneficiary_data->reference_campaign = $request->input('reference_campaign');
            $beneficiary_data->email = $request->input('email');
            $beneficiary_data->ini_operator = Auth::user()->id;
            $beneficiary_data->status = $request->input('status');

            $query = $beneficiary_data->save();

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
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function show(Campaign $campaign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $beneficiary = Beneficiary::where('id', $id)->first();

        return view('campaign.edit', ['beneficiary' => $beneficiary,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campaign $campaign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign)
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
        $campaign = Campaign::where('reference', $request->reference)->get();
        $beneficiary = Beneficiary::where('reference_campaign', $request->reference)->get();
        //dd($items);


        if (!$beneficiary) {
            return response()->json(['status' => 0]);
        } else {
            return response()->json($beneficiary);
        }
    }
}
