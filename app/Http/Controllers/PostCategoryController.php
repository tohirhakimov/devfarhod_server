<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostCategoryResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\CategoryResource;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Models\Category;

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
            'post_id' => 'required|exists:posts',
            'category_id' => 'required|exists:categories',
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
    public function update(Request $request, Category $category)
    {
        $validate = Validator::make($request->toArray(), [
            'name' => 'required',
            'slug' => 'required|unique:categories',
            'perent_id' => 'required|exists:categories',
        ]);

        if ($validate->fails()) {
            return response($validate->errors(), 400);
        }

        $category->update($validate->validate());
        return response(new CategoryResource($category), 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response(null, 204);
    }
}
