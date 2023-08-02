<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Delivery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @param $delivery_comments
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'address' => 'required',
            'postal_code' => 'required|regex:/\b\d{5}\b/',
            'city' => 'required',
            'country' => 'required',
            'is_default' => 'required',
        ]);
        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            if (!empty($request->input('id'))) {
                $delivery = Delivery::find($request->input('id'));
                $delivery_comments = Comment::find($request->input('id'));
                //dd($delivery_comments);
                //$delivery = Delivery::all();
                //dd($request->input('id'));
                if ($delivery_comments){
                    $delivery_comments->content = $request->input('comments');
                    $delivery_comments->ref_id = Auth::user()->id;
                    $delivery_comments->comment_type = 'billing';

                    $delivery_comments->update();
                }else{
                    $delivery_comments = new Comment;

                    $delivery_comments->content = $request->input('comments');
                    $delivery_comments->ref_id = Auth::user()->id;
                    $delivery_comments->comment_type = 'billing';

                    $delivery_comments->update();
                }
                if ($delivery) {
                    $delivery->id = $request->input('id');
                    $delivery->user_id = $request->input('user_id');
                    $delivery->address = $request->input('address');
                    $delivery->postal_code = $request->input('postal_code');
                    $delivery->city = $request->input('city');
                    $delivery->state = $request->input('state');
                    $delivery->country = $request->input('country');
                    $delivery->is_default = $request->input('is_default');

                    if (($request->is_default) == '1') {
                        DB::table('identity.address')->select(['is_default'])
                            ->where('user_id', '=', $request->user_id)->update(['is_default' => '0']);

                        $query = $delivery->update();
                    } else if($request->comments) {

                        $query = $delivery_comments->update();
                    }else{
                        $query = $delivery->update();
                    }


                    $delivery_address = DB::table('identity.address')->select(['*'])
                        ->where('user_id', '=', $delivery->user_id)
                        ->get()->toArray();
                    if (!$query) {
                        return response()->json(['status' => 0, 'delivery_address' => $delivery_address, 'id' => $delivery->id, 'msg' => 'Something went wrong']);
                    } else {
                        return response()->json(['status' => 1, 'delivery_address' => $delivery_address, 'id' => $delivery->id, 'msg' => 'New Delivery Details Added']);
                    }
                }
            } else {

                $delivery = new Delivery;

                /*
                 * delivery table id (auto incremented)
                 */
                $delivery->id = $request->input('id');
                /*
                 * user_id in the delivery table
                 */
                $delivery->user_id = $request->input('user_id');
                $delivery->address = $request->input('address');
                $delivery->postal_code = $request->input('postal_code');
                $delivery->city = $request->input('city');
                $delivery->state = $request->input('state');
                $delivery->country = $request->input('country');
                $delivery->is_default = $request->input('is_default');
                //dd($delivery);

                //            print_r($delivery);
                if ($request->is_default) {
                    if (($request->is_default) == '1') {
                        $is_default = (object)DB::table('identity.address')->select(['is_default'])
                            ->where('user_id', '=', $request->user_id)->update(['is_default' => '0']);
                        // ->get()->toArray();
                        $query = $delivery->save();
                    }else{
                        $query = $delivery->update();
                    }
                    $delivery_address = DB::table('identity.address')->select(['*'])
                        ->where('user_id', '=', $delivery->user_id)
                        ->get()->toArray();
                    if (!$query) {
                        return response()->json(['status' => 0, 'delivery_address' => $delivery_address, 'id' => $delivery->id, 'msg' => 'Something went wrong']);
                    } else {
                        return response()->json(['status' => 1, 'delivery_address' => $delivery_address, 'id' => $delivery->id, 'msg' => 'New Delivery Details Added']);
                    }
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     *
     */
    public function show(Delivery $delivery)
    {
        //
    }

    /**
     * 1.find the delivery address
     */
    public function find_address(Request $request)
    {
        $delivery = Delivery::find($request->id);
        //dd($request->id);

        $address = DB::table('identity.address')
            ->select(['address'])
            ->where('user_id', '=', $request->user_id)
            ->get()->toArray();
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
    public function update(Request $request, Delivery $delivery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     *
     */
    public function destroy(Delivery $delivery)
    {
        //
    }
}
