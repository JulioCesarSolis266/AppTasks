<?php

namespace App\Http\Controllers;

use App\Http\Requests\BranchesValidationsRequest;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Branch;
use Illuminate\Validation\ValidationException;

class BranchesController extends Controller
{
    public function index(){
        $branches = Branch::All();
        return $branches;
    }

    public function store(BranchesValidationsRequest $request)
    {

        $validatedData = $request->validated();

        $branches = Branch::create($validatedData);

        return response()->json([
            'message' => 'Branch created successfully',
            'branch' => $branches,
        ]);
    }
}
