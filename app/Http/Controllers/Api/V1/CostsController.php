<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CostResource;
use App\Models\Cost;
use Illuminate\Http\Request;

class CostsController extends Controller
{
    public function index()
    {
        return CostResource::collection(Cost::all());
    }
    public function store(Request $request)
    {
        return new CostResource(Cost::create($request->all()));
    }
    public function show(Cost $cost)
    {
        return new CostResource($cost);
    }
    public function update(Request $request, Cost $cost)
    {
        if ($cost->update($request->all())) {
            return response()->json([
                'message' => 'Cost updated successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Error updating cost'
            ], 500);
        }
    }
    public function destroy(Cost $cost)
    {
        if ($cost->delete()) {
            return response()->json([
                'message' => 'Cost deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Error deleting cost'
            ], 500);
        }
    }

}
