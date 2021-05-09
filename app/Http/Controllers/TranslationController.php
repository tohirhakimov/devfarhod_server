<?php

namespace App\Http\Controllers;

use App\Http\Resources\TranslationResource;
use App\Models\Translation;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $translations = Translation::paginate(10);
        return TranslationResource::collection($translations);
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
        $translation = new Translation();
        $translation->table = $request->table;
        $translation->row = $request->row;
        $translation->column = $request->column;
        $translation->value = $request->value;
        if ($translation->save()) {
            return new TranslationResource($translation);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Translation  $translation
     * @return \Illuminate\Http\Response
     */
    public function show(Translation $translation, $id)
    {
        $translation = Translation::findOrFail($id);
        return new TranslationResource($translation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Translation  $translation
     * @return \Illuminate\Http\Response
     */
    public function edit(Translation $translation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Translation  $translation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Translation $translation, $id)
    {
        $translation = Translation::findOrFail($id);
        $translation->table = $request->table;
        $translation->row = $request->row;
        $translation->column = $request->column;
        $translation->value = $request->value;
        if ($translation->save()) {
            return new TranslationResource($translation);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Translation  $translation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Translation $translation, $id)
    {
        $translation = Translation::findOrFail($id);
        if ($translation->delete()) {
            return new TranslationResource($translation);
        }
    }
}
