<?php

namespace App\Http\Controllers;

use App\Models\CourseStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class CourseStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * 1.find status regarded to the application id and
     *
     */
    public function store(Request $request)
    {

        $status_data = CourseStatus::where('application_id', '=', $request->application_id)
            ->where('status_id', '=', $request->status_id)->first();



        //dd($status_data);
        if ($status_data)
        {

            //$status = CourseStatus::find($request->input('application_id'));
            //dd($status);

            if ($status_data) {
                $status_data->application_id = $request->input('application_id');
                $status_data->status_id = $request->input('status_id');
                $status_data->reference = $request->input('reference');
                $status_data->operator_id = Auth::user()->id;

                $query  = CourseStatus::where('application_id', '=', $request->application_id)
                    ->where('status_id', '=', $request->status_id)->update( array('application_id'=>$request->application_id, 'status_id'=>$request->status_id) );

                if (!$query) {
                    return response()->json(['status' => 0, 'msg' => 'Something went wrong']);
                } else {
                    return response()->json(['status' => 1, 'msg' => ' updated']);
                }
            }
        }else{

            $status_data = new CourseStatus();
            $status_data->application_id = $request->input('application_id');
            $status_data->status_id = $request->input('status_id');
            $status_data->reference = $request->input('reference');
            $status_data->operator_id = Auth::user()->id;

            $query = $status_data->save();

            if (!$query) {
                return response()->json(['status' => 0, 'msg' => 'Something went wrong1']);
            } else {
                return response()->json(['status' => 1, 'msg' => 'Added']);
            }
        }



        //$courses->operator_id = Auth::user()->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseStatus  $courseStatus
     * @return \Illuminate\Http\Response
     */
    public function show(CourseStatus $courseStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseStatus  $courseStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseStatus $courseStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseStatus  $courseStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseStatus $courseStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseStatus  $courseStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseStatus $courseStatus)
    {
        //
    }
}
