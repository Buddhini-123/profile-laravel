<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;
use DB;
use Helper;
use Illuminate\Support\Facades\Validator;

class EmailController extends Controller
{
    /**
     * display email page
     */
    public function show(Request $request)
    {

        $email = Helper::getList("email");

        $email_data = DB::table('membership.email_template')
            ->select(['*'])
            ->where('status', "=", 1)
            ->get();
        $email_election = DB::table('membership.email_template')->select(['*'])
            ->where('type', '=', "Elections")
            ->get();
        $email_type_section = DB::table('membership.email_template')->select(['type'])
            ->groupby('type')
            ->get();
        $email_type = DB::table('membership.email_template')->select(['*'])
            //->groupby('type')
            ->get();

        return view('email.show', [
            'email' => $email, 'email_data' => $email_data, 'email_election' => $email_election, 'email_type' => $email_type, 'email_type_section' => $email_type_section
        ]);
    }
    /**
     * 1.Do validation
     * 2.If validation passes check for id in the email table
     * 3.If id exists requests details for update and do update
     * 4.else requests details for new email and insert
     *
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'title_identifier' => 'required',
            'sender_email' => 'required',
            'body' => 'required',
            'sender' => 'required',
            'email_identifier' => 'required',
            'senser_email' => 'required',
            'reply_to' => 'required',
            'footer' => 'required',
            'banner' => 'required',

        ]);
        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            if (!empty($request->input('id'))) {
                $email_data = Email::find($request->input('id'));
                //dd($email_data);

                if ($email_data) {
                    $email_data->title_identifier = $request->input('title_identifier');
                    $email_data->email_identifier = $request->input('email_identifier');
                    $email_data->sender_email = $request->input('sender_email');
                    $email_data->sender_eng = $request->input('sender_eng');
                    $email_data->title_eng = $request->input('title');
                    $email_data->body_eng = $request->input('body');
                    $email_data->footer_eng = $request->input('footer');
                    $email_data->type = $request->input('type');
                    $email_data->status = $request->input('status');
                    $email_data->banner = $request->input('banner');
                    $email_data->login = $request->input('login');
                    $email_data->cc = $request->input('cc');
                    $email_data->bcc = $request->input('bcc');
                    $email_data->login = $request->input('login');
                    $email_data->reply_to = $request->input('reply_to');

                    $query = $email_data->update();

                    if (!$query) {
                        return response()->json(['status' => 0, 'msg' => 'Something went wrong']);
                    } else {
                        return response()->json(['status' => 1, 'msg' => 'Email updated']);
                    }
                }
            }

            $email_data = new Email;
            $email_data->title_identifier = $request->input('title_identifier');
            $email_data->email_identifier = $request->input('email_identifier');
            $email_data->sender_email = $request->input('sender_email');
            $email_data->sender_eng = $request->input('sender_eng');
            $email_data->title_eng = $request->input('title');
            $email_data->body_eng = $request->input('body');
            $email_data->footer_eng = $request->input('footer');
            $email_data->type = $request->input('type');
            $email_data->status = $request->input('status');
            $email_data->login = $request->input('login');
            $email_data->banner = $request->input('banner');
            $email_data->cc = $request->input('cc');
            $email_data->bcc = $request->input('bcc');
            $email_data->login = $request->input('login');
            $email_data->reply_to = $request->input('reply_to');

            $query = $email_data->save();

            if (!$query) {
                return response()->json(['status' => 0, 'msg' => 'Something went wrong']);
            } else {
                return response()->json(['status' => 1, 'msg' => 'New Email added']);
            }
        }
    }


    /**
     * display edit page
     */
    public function edit(Request $request)
    {
        $email_data = Email::where('id', $request->id)->first();

        return view('email/edit', [
            'email_data' => $email_data

        ]);
    }

    /**
     * 1.requests the particular id on click on the type
     * 2.Select the details regarded to the type
     */
    public function ajaxGet(Request $request)
    {


        $emails = DB::table('membership.email_template')
            ->select(['*'])
            ->where('type', '=', $request->type)->get();


        if (!$emails) {
            return response()->json(['status' => 0]);
        } else {
            return response()->json($emails);
        }
    }

    public function create(Request $request)
    {
        $email_data = Email::where('id', $request->id)->first();

        $email_data =(object)["id" => "",
            "title_identifier" => "",
            "email_identifier" => "",
            "sender_email" => "",
            "login" => "",
            "sender_eng" => "",
            "title_eng" => "",
            "body_eng" => "",
            "footer_eng" => "",
            "type" => "",
            "status" => "",
            "banner" => "",
            "cc" => "",
            "reply_to" => "",
            "date_created" => "",
            "bcc" => "",];

        //dd($item_data);

        return view('email/edit', [
            'email_data' => $email_data

        ]);
    }
}
