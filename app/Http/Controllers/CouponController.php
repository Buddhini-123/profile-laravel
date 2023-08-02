<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {

        $coupon = DB::table('membership.coupon_codes')
            ->select(['reference'])
            ->groupby('reference')
            ->get();

        $coupon_data = DB::table('membership.coupon_codes')
            ->select(['*'])
            ->get();

        return view('coupon.show', ['coupon' => $coupon,'coupon_data' => $coupon_data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create(Request $request)
    {
        $coupons = Coupon::where('id', $request->id)->first();

        $coupons =(object)[
            "id" => "",
            "code" => "",
        "course_id" => "",
        "reference" => "",
        "tag" => "",
        "email" => "",
        "start_date" => "",
        "end_date" => "",
        "is_used" => "",
        "used_date" => "",
        "is_active" => "",
        "membership_start" => "",
        "membership_end" => "",
            ];

        return view('coupon/edit', [
            'coupons' => $coupons

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'tag' => 'required',
            'is_used' => 'required',
            'is_active' => 'required',
            'membership_start' => 'required',
            'membership_end' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',

        ]);
        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            //dd($request);
            if (!empty($request->input('id'))) {
                $coupon_data = Coupon::find($request->input('id'));
                //dd($coupon_data);

                if ($coupon_data) {
                    $coupon_data->code = $request->input('code');
                    $coupon_data->course_id = $request->input('course_id');
                    $coupon_data->reference = $request->input('reference');
                    $coupon_data->tag = $request->input('tag');
                    $coupon_data->email = $request->input('email');
                    $coupon_data->start_date = $request->input('start_date');
                    $coupon_data->end_date = $request->input('end_date');
                    $coupon_data->is_used = $request->input('is_used');
                    $coupon_data->used_date = $request->input('used_date');
                    $coupon_data->is_active = $request->input('is_active');
                    $coupon_data->membership_start = $request->input('membership_start');
                    $coupon_data->membership_end = $request->input('membership_end');

                    $query = $coupon_data->update();

                    if (!$query) {
                        return response()->json(['status' => 0, 'msg' => 'Something went wrong']);
                    } else {
                        return response()->json(['status' => 1, 'msg' => 'Item updated']);
                    }
                }
            }

            $coupon_data = new Coupon();
            $coupon_data->code = $request->input('code');
            $coupon_data->course_id = $request->input('course_id');
            $coupon_data->reference = $request->input('reference');
            $coupon_data->tag = $request->input('tag');
            $coupon_data->email = $request->input('email');
            $coupon_data->start_date = $request->input('start_date');
            $coupon_data->end_date = $request->input('end_date');
            $coupon_data->is_used = $request->input('is_used');
            $coupon_data->used_date = $request->input('used_date');
            $coupon_data->is_active = $request->input('is_active');
            $coupon_data->membership_start = $request->input('membership_start');
            $coupon_data->membership_end = $request->input('membership_end');

            $query = $coupon_data->save();

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
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        $coupons = Coupon::where('id', $id)->first();

        return view('coupon.edit', ['coupons' => $coupons,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        //
    }
}
