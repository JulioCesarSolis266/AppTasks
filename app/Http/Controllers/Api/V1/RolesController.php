<?php

namespace App\Http\Controllers\Api\\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function login(Request $request)
    {
        // Assuming you receive the role in the request
        $role = $request->input('role');

        // Authenticate the user based on the role
        if ($role === 'boss') {
            // Boss specific logic
            return response()->json(['message' => 'Welcome, Boss!']);
        } elseif ($role === 'worker') {
            // Worker specific logic
            return response()->json(['message' => 'Welcome, Worker!']);
        } else {
            return response()->json(['error' => 'Invalid role'], 400);
        }
    }
}
