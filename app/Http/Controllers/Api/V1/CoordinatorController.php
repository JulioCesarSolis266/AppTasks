<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\CoordinatorResource;
use App\Http\Controllers\Controller;
use App\Models\Coordinator;
use Illuminate\Http\Request;

class CoordinatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $relation = Coordinator::with(['branch.company'])->orderBy('id')->get();// Esta linea es la que se agrega para que se muestre la relacion

        return $relation;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return new CoordinatorResource(Coordinator::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Coordinator $coordinator)
    {
        return new CoordinatorResource($coordinator);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coordinator $coordinator)
    {
        if($coordinator->update($request->all())){
            return response()->json([
                'message' => 'Coordinator updated successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Coordinator could not be updated'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coordinator $coordinator)
    {
        if($coordinator->delete()){
            return response()->json([
                'message' => 'Coordinator deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Coordinator could not be deleted'
            ], 500);
        }
    }
}
