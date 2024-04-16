<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\RoleResource;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        return RoleResource::collection(Role::all());
    }

    public function store(Request $request)
    {
        return new RoleResource(Role::create($request->all()));
    }

    public function show(Role $role)
    {
        return new RoleResource($role);
    }

    public function update(Request $request, Role $role)
    {
        if($role->update($request->all())){
            return response()->json([
                'message' => 'Role updated successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Role could not be updated'
            ], 500);
        }
    }

    public function destroy(Role $role)
    {
        if($role->delete()){
            return response()->json([
                'message' => 'Role deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Role could not be deleted'
            ], 500);
        }
    }
}
