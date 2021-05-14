<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostCategoryResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\postCategory;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(PostCategoryResource::collection(PostCategory::all()), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $postcategory)
    {
        $validate = Validator::make($postcategory->toArray(), [
            'post_id' => 'required|exists:categories',
            'gategory_id' => 'required|exists:categories',
        ]);

        if ($validate->fails()) {
            return response($validate->errors(), 400);
        }

        return response(new PostCategoryResource(PostCategory::create($validate->validate())), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PostCategory $postcategory)
    {
        return response(new PostCategoryResource($postcategory), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $postcategory, Category $categorys)
    {
        $validate = Validator::make($postcategory->toArray(), [
            'name' => 'required',
            'slug' => 'required',
            'perent_id' => 'required|exists:categories',
        ]);

        if ($validate->fails()) {
            return response($validate->errors(), 400);
        }

        $categorys->update($validate->validate());
        return response(new CategoryResource($categorys), 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $categorys)
    {
        $categorys->delete();

        return response(null, 204);
    }
}
