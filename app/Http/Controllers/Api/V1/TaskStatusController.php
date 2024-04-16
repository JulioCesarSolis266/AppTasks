<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\TaskStatusResource;
use App\Models\TaskStatus;
use Illuminate\Http\Request;

class TaskStatusController extends Controller
{
    public function index(Request $request)
    {
        return TaskStatusResource::collection(TaskStatus::all());
    }

    public function show(TaskStatus $taskStatus)
    {
        return new TaskStatusResource($taskStatus);
    }

    public function store(Request $request)
    {
        return new TaskStatusResource(TaskStatus::create($request->all()));
    }

    public function update(Request $request, TaskStatus $taskStatus)
    {
        if($taskStatus->update($request->all())){
            return response()->json([
                'message' => 'Task_Status updated successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Task_Status could not be updated'
            ], 500);
        }
    }

    public function destroy(TaskStatus $taskStatus)
    {
        if($taskStatus->delete()){
            return response()->json([
                'message' => 'Task_Status deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Task_Status could not be deleted'
            ], 500);
        }
    }
}
