<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CoordinatorsValidationsRequest;
use App\Models\Coordinator;


class CoordinatorsController extends Controller
{
    public function index(){
        $coordinators = Coordinator::All();
        return $coordinators;
    }

    public function store(CoordinatorsValidationsRequest $request){
        $validatedData = $request->validated();

        $coordinators = Coordinator::create($validatedData);

        return response()->json([
            'message' => 'Coordinator created successfully',
            'coordinator' => $coordinators,
        ]);

    }
}
