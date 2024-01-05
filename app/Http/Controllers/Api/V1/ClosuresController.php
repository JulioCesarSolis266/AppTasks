<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\ClosureResource;
use App\Models\Closure;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClosuresController extends Controller
{
    public function index(Request $request)
    {
        $relation = Closure::with(['task'])->orderBy('id')->get();
        return $relation;
    }
    public function store(Request $request)
    {
        return new ClosureResource(Closure::create($request->all()));
    }
    public function show(Closure $closure)
    {
        $closure = Closure::with('task')->find($closure->id);
        return new ClosureResource($closure);
    }
    public function update(Request $request, Closure $closure)
    {
        if($closure->update($request->all())){
            return response()->json([
                'message' => 'Closure updated successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Closure could not be updated'
            ], 500);
        }
    }
    public function destroy(Closure $closure)
    {
        if($closure->delete()){
            return response()->json([
                'message' => 'Closure deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Closure could not be deleted'
            ], 500);
        }
    }
}
