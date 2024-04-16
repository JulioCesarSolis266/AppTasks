<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\TaskPriorityResource;
use App\Models\TaskPriority;
use Illuminate\Http\Request;

class TaskPrioritiesController extends Controller
{
    public function index()
    {
        return TaskPriorityResource::collection(TaskPriority::all());
    }

    public function show(TaskPriority $taskPriority)
    {
        return new TaskPriorityResource($taskPriority);
    }

    public function store(Request $request)
    {
        return new TaskPriorityResource(TaskPriority::create($request->all()));
    }

    public function update(Request $request, TaskPriority $taskPriority)
    {
        if($taskPriority->update($request->all())){
            return response()->json([
                'message' => 'Task Priority updated successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Task Priority could not be updated'
            ], 500);
        }
    }

    public function destroy(TaskPriority $taskPriority)
    {
        if($taskPriority->delete()){
            return response()->json([
                'message' => 'Task Priority deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Task Priority could not be deleted'
            ], 500);
        }
    }
}
