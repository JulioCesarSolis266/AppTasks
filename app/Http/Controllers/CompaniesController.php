<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompaniesValidationsRequest;
use App\Models\Company;

class CompaniesController extends Controller
{
    public function index(){
        $companies = Company::All();
        return $companies;
    }

    public function store(CompaniesValidationsRequest $request){
        $validatedData = $request->validated();

        $companies = Company::create($validatedData);

        return response()->json([
            'message' => 'Company created successfully',
            'bread' => $companies,
        ]);
    }
}
