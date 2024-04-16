<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Title;
use App\Http\Resources\V1\TitleResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TitlesController extends Controller{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TitleResource::collection(Title::all());
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return new TitleResource(Title::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Title $Title)
    {
        return new TitleResource($Title);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Title $Title)
    {
        if($Title->update($request->all())){
            return response()->json([
                'message' => 'Title updated successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'title could not be updated'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Title $Title)
    {
        if($Title->delete()){
            return response()->json([
                'message' => 'Title deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Title could not be deleted'
            ], 500);
        }
    }
}
