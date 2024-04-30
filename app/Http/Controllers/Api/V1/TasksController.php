<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\TaskResource;
use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Employee;
use Illuminate\Http\Request;// Para poder usar el request Y poder hacer la validacion

class TasksController extends Controller
{
    public function index()
    {
        $relation = Task::with(['employee','coordinator.branch.company', 'priority', 'status'])->orderBy('id')->get();// Haciendo la relacion

        return $relation;
    }

    public function tasksForEmployee(Employee $employee)//
    {
    $tasks = Task::with(['employee.user', 'coordinator.branch.company','priority', 'status'])//Los nombres colocados aca son los
        ->where ('employee_id', $employee->id)
        ->orderBy('id')
        ->get();

    return $tasks;
    }

    public function store(Request $request)
    {
        return new TaskResource(Task::create($request->all()));
    }
     public function show($id)
    {
        $task = Task::with('employee', 'coordinator.branch.company', 'priority', 'status')->find($id);

        return response()->json(['data' => $task]);
    }
    public function update (Request $request, Task $task)
    {
        $task->update($request->all());
        return response()->json(['data' => $task]);
    }
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
