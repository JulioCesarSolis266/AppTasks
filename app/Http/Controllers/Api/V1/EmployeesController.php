<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\V1\EmployeeResource;
use App\Models\Employee;

class EmployeesController extends Controller
{
    public function index()
    {
        //Entre parentesis va el nombre de la relacion, la funcion que se encuentra en el modelo.
        $relation = Employee::with(['user', 'genre','position','title'])->orderBy('id')->get();
        return $relation;

    }
    public function task($employeeId)
{
    // Obtener un employee específico
    $employee = Employee::find($employeeId);
    // $employee = Employee::where('id', $employeeId)->first();

    if (!$employee) {
        return response()->json(['message' => 'Empleado no encontrado'], 404);
    }

    $tasks = $employee->tasks()
        ->with('branch', 'coordinator', 'employee', 'priority','client', 'status') // Cargar la relación con branch, coordinator y employee.
        ->get();

    return response()->json($tasks, 200);
}
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return new EmployeeResource(Employee::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return new EmployeeResource($employee);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        if($employee->update($request->all())){
            return response()->json([
                'message' => 'Employee updated successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Employee could not be updated'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        if($employee->delete()){
            return response()->json([
                'message' => 'Employee deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Employee could not be deleted'
            ], 500);
        }
    }
}
