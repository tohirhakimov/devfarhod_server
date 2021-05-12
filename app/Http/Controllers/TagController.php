<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Resources\TagResource;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(TagResource::collection(Tag::all()), 200);
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
            'name' => 'required',
            'slug' => 'required',
            'parent_id' => 'required|exists:tags',

        ]);

        if ($validate->fails()) {
            return response($validate->errors(), 400);
        }
        return response(new TagResource(Tag::create($validate->validate())), 201); // 201 Created
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return response(new TagResource($tag), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $validate = Validator::make($request->toArray(), [
            'name' => 'required',
            'slug' => 'required',
            'parent_id' => 'required|exists:tags',
        ]);

        if ($validate->fails()) {
            return response($validate->errors(), 400);
        }

        $tag->update($validate->validate());
        return response(new TagResource($tag), 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return response(null, 204);
    }
}
