<?php

namespace App\Http\Controllers;

use App\Models\Сategory;
use Illuminate\Http\Request;
use App\Http\Resources\СategoryResource;
use Illuminate\Support\Facades\Validator;

class СategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CategoryResourge::collection(
            Category::paginate(10)
        );
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
            'perent_id' => 'required',
        ]);

        if ($validate->fails()) {
            return response($validate->errors(), 400);
        }

        return response(new СategoryResource(Сategory::create($validate->validate())), 201); // 201 Created
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Сategory $Сategory, $id)
    {
        return response(new СategoryResource($Сategory), 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Сategory $Сategory, $id)
    { 
        $validate = Validator::make($request->toArray(), [
            'name' => 'required',
            'slug' => 'required',
            'perent_id' => 'required',
        ]);

        if ($validate->fails()) {
            return response($validate->errors(), 400);
        }

        $Сategory->update($validate->validate());
        return response(new СategoryResource($Сategory), 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Сategory $Сategory, $id)
    {
        $Сategory->delete();

        return response(null, 204);
    }
}
