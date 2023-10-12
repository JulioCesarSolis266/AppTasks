<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\BranchResource;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BranchResource::collection(Branch::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return new BranchResource(Branch::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        return new BranchResource($branch);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branch $branch)
    {
        if($branch->update($request->all())){
            return response()->json([
                'message' => 'Branch updated successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Branch could not be updated'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        if($branch->delete()){
            return response()->json([
                'message' => 'Branch deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Branch could not be deleted'
            ], 500);
        }
    }
}
