<?php

namespace App\Http\Controllers;

use App\Models\PostTag;
use Illuminate\Http\Request;
use App\Http\Resources\PostTagResource;
use Illuminate\Support\Facades\Validator;

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
        return response(new PostTagResource(PostTag::create($validate->validate())), 201); // 201 Created
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostTag  $postTag
     * @return \Illuminate\Http\Response
     */
    public function edit(PostTag $postTag)
    {
        //
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
        return response(new PostTagResource(PostTag::create($validate->validate())), 201); // 201 Created
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
