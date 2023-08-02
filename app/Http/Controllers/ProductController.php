<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $product = DB::table('journal.product')
            ->select(['*'])
            ->where('status', "=", 1)
            ->get();

        $product_name = DB::table('journal.product')->select(['*'])
            //->groupby('name')
            ->get();

        $item = DB::table('journal.item_list')->select(['*'])
            ->where('status', "=", 1)
            //->groupby('name')
            ->get();
        $item_data = DB::table('journal.item_list')->select(['*'])
            ->get();


        //dd($request->id);

        return view('product.show', [
            'product' => $product ,'product_name' => $product_name,'item' => $item,'item_data' => $item_data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product_data = DB::table('journal.product')
            ->select(['*'])
            ->get();

        $item_data =(object)["id" => "",
            "product_id" => "",
            "name" => "",
            "description" => "",
            "price" => "",
            "order_id" => "",
            "status" => "",
            "operator" => ""];

    //dd($item_data);

        return view('product.edit', ['item_data' => $item_data,
            'product_data' => $product_data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|integer',

        ]);
        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            if (!empty($request->input('id'))) {
                $product_data = Item::find($request->input('id'));
                //dd($product_data);

                if ($product_data) {
                    $product_data->product_id = $request->input('product_id');
                    $product_data->name = $request->input('name');
                    $product_data->description = $request->input('description');
                    $product_data->price = $request->input('price');
                    $product_data->status = $request->input('status');
                    $product_data->operator = Auth::user()->id;

                    $query = $product_data->update();

                    if (!$query) {
                        return response()->json(['status' => 0, 'msg' => 'Something went wrong']);
                    } else {
                        return response()->json(['status' => 1, 'msg' => 'Item updated']);
                    }
                }
            }

            $product_data = new Item;
            $product_data->product_id = $request->input('product_id');
            $product_data->name = $request->input('name');
            $product_data->description = $request->input('description');
            $product_data->price = $request->input('price');
            $product_data->status = $request->input('status');
            $product_data->operator = Auth::user()->id;

            $query = $product_data->save();

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
    public function edit($id)
    {
//        dd($id);
        if (isset($id)) {
            $item_data = Item::where('id', $id)->first();
            //dd($item_data);
            $product_data = DB::table('journal.product')
                ->select(['*'])
                //->groupby('name')
                ->get();
        }else{
            $item_data =[
                "id" => "",
                "product_id" => "",
                "name" => "",
                "description" => "",
                "price" => "",
                "order_id" => "",
                "status" => "",
                "operator" => ""];

        }
        //dd($product_data);
        return view('product.edit', ['item_data' => $item_data,
            'product_data' => $product_data
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
}
