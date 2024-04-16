<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\PositionResource;
use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionsController extends Controller
{
    public function index()
    {
        return PositionResource::collection(Position::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return new PositionResource(Position::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Position $Position)
    {
        return new PositionResource($Position);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Position $position)
    {
        if($position->update($request->all())){
            return response()->json([
                'message' => 'Position updated successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Position could not be updated'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $Position)
    {
        if($Position->delete()){
            return response()->json([
                'message' => 'Position deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Position could not be deleted'
            ], 500);
        }
    }
}
