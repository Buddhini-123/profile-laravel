<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * display view
     */
    public function show(Request $request)
    {

        $post = DB::table('membership.post')->select(['*'])
            ->get();

        $post_data = DB::table('membership.post')
            ->select(['*'])
            ->where('status', "=", 1)
            ->get();

        $post_type_section = DB::table('membership.post')->select(['type'])
            ->groupby('type')
            ->get();
        $post_type = DB::table('membership.post')->select(['*'])
            //->groupby('type')
            ->get();

        return view('post.post-show', [
            'post' => $post, 'post_data' => $post_data, 'post_type_section' => $post_type_section, 'post_type' => $post_type
        ]);
    }

    /**
     * 1.requests the particular id on click on the type
     * 2.Select the title regarded to the type
     */
    public function ajaxGet(Request $request)
    {

        $post_select = DB::table('membership.post')
            ->select(['*'])
            ->where('type', '=', $request->type)
            ->get();

        if (!$post_select) {
            return response()->json(['status' => 0]);
        } else {
            return response()->json($post_select);
        }
    }

    /**
     * display post edit page
     */
    public function edit(Request $request)
    {

        $post_data = DB::table('membership.post')
            ->select(['*'])
            ->where('id', $request->id)
            ->first();
        return view('post.post-edit', [
            'post_data' => $post_data
        ]);
    }

    /**
     * 1.Do validation
     * 2.If validation passes check for id in the post table
     * 3.If id exists requests details for update and do update
     * 4.else requests details for new post and insert
     *
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'slug' => 'required',
            'sub_title' => 'required',
            'url' => 'required',
            'status' => 'required',
        ]);
        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            if (!empty($request->input('id'))) {
                $post_data = Post::find($request->input('id'));

                if ($post_data) {
                    $post_data->title = $request->input('title');
                    $post_data->type = $request->input('type');
                    $post_data->slug = $request->input('slug');
                    $post_data->content = $request->input('content');
                    $post_data->sub_title = $request->input('sub_title');
                    $post_data->url = $request->input('url');
                    $post_data->status = $request->input('status');
                    $post_data->image = $request->input('image');

                    $query = $post_data->update();

                    if (!$query) {
                        return response()->json(['status' => 0, 'msg' => 'Something went wrong']);
                    } else {
                        return response()->json(['status' => 1, 'msg' => 'Post updated']);
                    }
                }
            }

            $post_data = new Post;
            $post_data->title = $request->input('title');
            $post_data->type = $request->input('type');
            $post_data->slug = $request->input('slug');
            $post_data->content = $request->input('content');
            $post_data->sub_title = $request->input('sub_title');
            $post_data->url = $request->input('url');
            $post_data->status = $request->input('status');
            $post_data->image = $request->input('image');

            $query = $post_data->save();

            if (!$query) {
                return response()->json(['status' => 0, 'msg' => 'Something went wrong']);
            } else {
                return response()->json(['status' => 1, 'msg' => 'New Post added']);
            }
        }
    }

    public function create(Request $request)
    {
        $post_data = DB::table('membership.post')
            ->select(['*'])
            ->where('id', $request->id)
            ->first();

        $post_data =(object)[
            "id" => "",
            "title" => "",
            "type" => "",
            "slug" => "",
            "content" => "",
            "sub_title" => "",
            "url" => "",
            "dateCreated" => "",
            "image" => "",
            "status" => ""];

        return view('post.post-edit', [
            'post_data' => $post_data
        ]);
    }
}
