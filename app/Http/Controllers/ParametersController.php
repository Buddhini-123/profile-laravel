<?php

namespace App\Http\Controllers;

use App\Models\Parameters;
use Illuminate\Http\Request;
use DB;

class ParametersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $tables = DB::select('SHOW TABLES FROM Global_Parameters;');
//        foreach ($tables as $table) {
//            print_r($table->Tables_in_global_parameters);
//        }
        return view('parameters.show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "eee";
        exit();
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parameters  $parameters
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        $parameters = DB::table("Global_Parameters." . $request->parameter)
            ->select(['*'])
            ->get();

        if (!$parameters) {
            return response()->json(['status' => 0]);
        } else {
            return response()->json($parameters);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parameters  $parameters
     * @return \Illuminate\Http\Response
     */
    public function edit(Parameters $parameters)
    {
        echo "deerr";
        exit();
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parameters  $parameters
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parameters $parameters)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parameters  $parameters
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parameters $parameters)
    {
        //
    }
}
