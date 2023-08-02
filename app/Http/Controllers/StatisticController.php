<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Statistic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;
use Helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $statistic = DB::table('membership.saved_statistics')
            ->select('*')
            ->paginate(10);
        return view('statistics.show', [
            'statistic' => $statistic
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'project' => 'required',
            'year' => 'required|digits:4',
            'task' => 'required',
            'sql' => 'required',
            'selection' => 'required',
            'icon' => 'required',
            'comment' => 'required',

        ]);
        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            //dd($request->id);
            if (!empty($request->input('id'))) {
                $statistic_data = Statistic::find($request->input('id'));
                //dd($statistic_data);

                if ($statistic_data) {
                    $statistic_data->title = $request->input('title');
                    $statistic_data->project = $request->input('project');
                    $statistic_data->year = $request->input('year');
                    $statistic_data->order_by = $request->input('order_by');
                    $statistic_data->task = $request->input('task');
                    $statistic_data->status = $request->input('status');
                    $statistic_data->sql = $request->input('sql');
                    $statistic_data->selection = $request->input('selection');
                    $statistic_data->icon = $request->input('icon');
                    $statistic_data->comment = $request->input('comment');
                    $statistic_data->user_id = Auth::user()->id;

                    $query = $statistic_data->update();

                    if (!$query) {
                        return response()->json(['status' => 0, 'msg' => 'Something went wrong']);
                    } else {
                        return response()->json(['status' => 1, 'msg' => 'Item updated']);
                    }
                }
            }

            $statistic_data = new Statistic();
            $statistic_data->title = $request->input('title');
            $statistic_data->project = $request->input('project');
            $statistic_data->year = $request->input('year');
            $statistic_data->order_by = $request->input('order_by');
            $statistic_data->task = $request->input('task');
            $statistic_data->status = $request->input('status');
            $statistic_data->sql = $request->input('sql');
            $statistic_data->selection = $request->input('selection');
            $statistic_data->icon = $request->input('icon');
            $statistic_data->comment = $request->input('comment');
            $statistic_data->user_id = Auth::user()->id;

            $query = $statistic_data->save();

            if (!$query) {
                return response()->json(['status' => 0, 'msg' => 'Something went wrong']);
            } else {
                return response()->json(['status' => 1, 'msg' => 'New Item added']);
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     */
    public function store(Request $request)
    {
        $statistic_data = Statistic::where('id', $request->id)->first();
        //dd($statistic_data);

        $statistic_data = (object)[
            "id" => "",
            "user_id" => "",
            "role_id" => "",
            "title" => "",
            "project" => "",
            "year" => "",
            "order_by" => "",
            "task" => "",
            "status" => "",
            "sql" => "",
            "selection" => "",
            "icon" => "",
            "comment" => "",
        ];

        return view('statistics.edit', compact('statistic_data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Statistic  $statistic
     * @return \Illuminate\Http\Response
     */
    public function show(Statistic $statistic)
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
        $statistic_data = Statistic::where('id', $id)->select('*')->first();
        //dd($statistic_data);
        return view('statistics.edit', compact('statistic_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Statistic  $statistic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statistic $statistic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     *
     */
    public function destroy($id)
    {

        Statistic::find($id)->delete();
        return redirect('statistics')->with('success', 'Data Deleted');
    }
    public function statistics_view()
    {

        $statistics = DB::table('membership.saved_statistics')
            ->select('sql')->where('status','=',1)
            ->get();
        $statistic_data = [];
        foreach ($statistics as $key => $statistic) {
            $sql = $statistic->sql;
            $years = [
                "previousYear" => date("Y", strtotime("-1 year")),
                "currentYear" => date("Y"),
                "nextYear" => date("Y", strtotime("+1 year")),
                "previousYearShort" => date("y", strtotime("-1 year")),
                "currentYearShort" => date("y"),
                "nextYearShort" => date("y", strtotime("+1 year")),
            ];

            $cache_para = Helper::getCodeNames("union_region");
            //dd($cache_para);

            if (preg_match('/\{([^\}]+)\}/', $sql)) {
                foreach ($years as $placeholder => $year) {
                    $sql = str_replace('{' . $placeholder . '}', $year, $sql);
                    $sql = str_replace('<' . $placeholder . '>', $year, $sql);
                }
            }

            // echo  $sql;
            $statistic_data[] =  DB::select($sql);
        }


        return view('statistics.statistics-view', compact('statistic_data'));



        //        $years = [
        //            "previousYear" => date("Y", strtotime("-1 year")),
        //            "currentYear" => date("Y"),
        //            "nextYear" => date("Y", strtotime("+1 year")),
        //            "previousYearShort" => date("y", strtotime("-1 year")),
        //            "currentYearShort" => date("y"),
        //            "nextYearShort" => date("y", strtotime("+1 year")),
        //        ];
        //
        //        $sql = $stats_value->getSql();
        //        if (preg_match('/\{([^\}]+)\}/', $sql)) {
        //            foreach ($years as $placeholder => $year) {
        //                $sql = str_replace('{' . $placeholder . '}', $year, $sql);
        //                $sql = str_replace('<' . $placeholder . '>', $year, $sql);
        //            }
        //        }
    }
}
