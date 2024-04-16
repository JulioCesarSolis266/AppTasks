<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\UserResource;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $relation = User::with(['role'])->orderBy('id')->get();// Esta linea es la que se agrega para que se muestre la relacion

        return $relation;
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return new UserResource(User::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::with('role')->find($id);

        return response()->json(['data' => $user]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        if($user->update($request->all())){
            return response()->json([
                'message' => 'User updated successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'User could not be updated'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if($user->delete()){
            return response()->json([
                'message' => 'User deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'User could not be deleted'
            ], 500);
        }
    }
}
