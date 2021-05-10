<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(UserResource::collection(User::all()), 200);
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
            'email' => 'required',
            'password' => 'required',
            'avatar' => 'required'
        ]);

        if ($validate->fails()) {
            return response($validate->errors(), 400);
        }
        return response(new UserResource(User::create($validate->validate())), 201); // 201 Created
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $User, $id)
    {
        return response(new UserResource($user), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, $id)
    {
        $validate = Validator::make($request->toArray(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'avata' => 'required'
        ]);

        if ($validate->fails()) {
            return response($validate->errors(), 400);
        }

        $user->update($validate->validate());
        return response(new UserResource($user), 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, $id)
    {
        $user->delete();

        return response(null, 204);
    }
}