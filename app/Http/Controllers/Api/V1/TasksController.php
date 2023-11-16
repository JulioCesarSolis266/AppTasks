<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\TaskResource;
use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {

        $relation = Task::with(['employee','branch','coordinator', 'priority', 'status', 'client'])->orderByDesc('id')->get();// Haciendo la relacion

        return $relation;
    }

    public function tasksForEmployee(Employee $employee)//
    {
    $tasks = Task::with(['employee', 'branch', 'coordinator', 'user','client', 'priority', 'status'])
        ->where ('employee_id', $employee->id)

        ->orderByDesc('id')
        ->get();

    return $tasks;
    }
    //
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return new TaskResource(Task::create($request->all()));
    }

    /**
     * Display the specified resource.
     */

     public function show($id)
    {
        $task = Task::with('employee','branch', 'coordinator', 'client', 'priority', 'status')->find($id);

        return response()->json(['data' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update (Request $request, Task $task)
    {
        if($task->update($request->all())){
            return response()->json([
                'message' => 'Task updated successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Task could not be updated'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        if($task->delete()){
            return response()->json([
                'message' => 'Task deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Task could not be deleted'
            ], 500);
        }
    }
}
