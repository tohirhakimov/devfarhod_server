<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(PostResource::collection(Post::all()), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->toArray(), [
            'title' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'excerpt' => 'required',
            'status' => 'required',
            'user_id' => 'required|exist:users'
        ]);

        if ($validate->fails()) {
            return response($validate->errors(), 400);
        }

        return response(new PostResource(Post::create($validate->validate())), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return response(new PostResource($post), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validate = Validator::make($request->toArray(), [
            'title' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'excerpt' => 'required',
            'status' => 'required',
            'user_id' => 'required|exist:users'
        ]);

        if ($validate->fails()) {
            return response($validate->errors(), 400);
        }

        return response(new PostResource(
            $post->update($validate->validate())
        ), 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, $id)
    {
        $post->delete();

        return response(null, 204);
    }
}
