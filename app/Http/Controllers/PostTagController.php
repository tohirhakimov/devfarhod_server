<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PostTagResource;
use Illuminate\Http\Request;
use App\Models\PostTag;

class PostTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(PostTagResource::collection(PostTag::all()), 200);
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
            'post_id' => 'required|exists:posts',
            'tag_id' => 'required|exists:tags',
        ]);

        if ($validate->fails()) {
            return response($validate->errors(), 400);
        }
        return response(new PostTagResource(PostTag::create($validate->validate())), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostTag  $postTag
     * @return \Illuminate\Http\Response
     */
    public function show(PostTag $postTag)
    {
        return response(new PostTagResource($postTag), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostTag  $postTag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostTag $postTag)
    {
        $validate = Validator::make($request->toArray(), [
            'post_id' => 'required|exists:posts',
            'tag_id' => 'required|exists:tags',
        ]);

        if ($validate->fails()) {
            return response($validate->errors(), 400);
        }
        return response(new PostTagResource($postTag->update($validate->validate())), 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostTag  $postTag
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostTag $postTag)
    {
        $postTag->delete();

        return response(null, 204);
    }
}
