<?php

namespace App\Http\Controllers\Courses;

use App\Models\Courses;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DB;
use Helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        //        $membership = DB::table('courses.courses')
        //            ->select(['*'])
        //            ->limit(10)
        //            ->get();

        $courses = DB::table('courses.courses')
            ->select([
                'courses.courses.title as course_title',
                'courses.courses.location',
                'courses.courses.course_fee',
                'courses.courses.accommodation_fee',
                'courses.courses.updated_at',
                'courses.courses.language',
                'courses.courses.accommodation_fee',
                'courses.courses.type', 'courses.courses.start_date', 'courses.courses.currency', 'courses.courses_application.*', 'courses.courses_billing.*'
                , 'identity.users.*','courses.courses_application.id as app_id'
            ])
            ->leftjoin('courses.courses_application',   'courses.courses_application.course_id', "=", "courses.courses.id")
            ->leftjoin('identity.users', 'courses.courses.id', '=', 'identity.users.id')
            ->leftjoin('courses.courses_application_status',   'courses.courses_application.id', "=", "courses.courses_application_status.application_id")
            ->leftjoin('courses.courses_billing', 'courses.courses.id', '=', 'courses.courses_billing.id')->orderBy('challenges_you_face_1', 'DESC')
            ->limit(10)
            ->get();

        return view('courses.list', ['membership' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {

        $courses = (object)[
            "id" => "",
            "title" => "",
            "detail" => "",
            "start_date" => "",
            "currency" => "",
            "course_fee" => "",
            "residential_package_fee" => "",
            "accommodation_fee" => "",
            "reference" => "",
            "location" => "",
            "language" => "",
            "dt_update" => "",
            "type" => "",
        ];

        return view('courses.edit', [
            'courses' => $courses
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'title' => 'required',

        ]);
        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            //dd($request->id);
            if (!empty($request->input('id'))) {
                $course_data = Courses::find($request->input('id'));
                //dd($course_data);

                if ($course_data) {
                    $course_data->title = $request->input('title');
                    $course_data->detail = $request->input('detail');
                    $course_data->location = $request->input('location');
                    $course_data->start_date = $request->input('start_date');
                    $course_data->currency = $request->input('currency');
                    $course_data->course_fee = $request->input('course_fee');
                    $course_data->residential_package_fee = $request->input('residential_package_fee');
                    $course_data->accommodation_fee = $request->input('accommodation_fee');
                    $course_data->reference = $request->input('reference');
                    $course_data->language = $request->input('language');
                    $course_data->dt_update = $request->input('dt_update');
                    $course_data->type = $request->input('type');

                    $query = $course_data->update();

                    if (!$query) {
                        return response()->json(['status' => 0, 'msg' => 'Something went wrong']);
                    } else {
                        return response()->json(['status' => 1, 'msg' => 'Item updated']);
                    }
                }
            }

            $course_data = new Courses();
            $course_data->title = $request->input('title');
            $course_data->detail = $request->input('detail');
            $course_data->location = $request->input('location');
            $course_data->start_date = $request->input('start_date');
            $course_data->currency = $request->input('currency');
            $course_data->course_fee = $request->input('course_fee');
            $course_data->residential_package_fee = $request->input('residential_package_fee');
            $course_data->accommodation_fee = $request->input('accommodation_fee');
            $course_data->reference = $request->input('reference');
            $course_data->language = $request->input('language');
            $course_data->dt_update = $request->input('dt_update');
            $course_data->type = $request->input('type');

            $query = $course_data->save();
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
     *
     */
    public function show(Courses $courses)
    {
        $course = DB::table('courses.courses')->select(['type'])
            ->groupby('type')
            ->get();

        $course_data = DB::table('courses.courses')->select(['*'])
            ->get();
        return view('courses.show', [
            'course' => $course, 'course_data' => $course_data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        $profile_languages = Helper::getList("profile_language");
        $courses = Courses::where('id', $id)->first();
        //dd($courses);
        return view('courses.edit', [
            'courses' => $courses, 'profile_languages' => $profile_languages
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     *
     */
    public function update(Request $request, Courses $courses)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courses $courses)
    {
        //
    }

    public function ajaxGet(Request $request)
    {


        $courses = DB::table('courses.courses')
            ->select(['*'])
            ->where('type', '=', $request->type)
            ->get();

        //dd($courses);

        if (!$courses) {
            return response()->json(['status' => 0]);
        } else {
            return response()->json($courses);
        }
    }

}
