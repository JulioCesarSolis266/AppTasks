<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\BranchResource;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchesController extends Controller
{

    public function index()
    {
        $relation = Branch::with(['company'])->orderBy('id')->get();// Esta linea es la que se agrega para que se muestre la relacion

        return $relation;
    }

    public function store(Request $request)
    {
        return new BranchResource(Branch::create($request->all()));
    }

    public function show(Branch $branch)
    {
        return new BranchResource($branch);
    }

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
