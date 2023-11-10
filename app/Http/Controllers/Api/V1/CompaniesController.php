<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\CompanyResource;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return CompanyResource::collection(Company::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return new CompanyResource(Company::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return new CompanyResource($company);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        if($company->update($request->all())){
            return response()->json([
                'message' => 'Company updated successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Company could not be updated'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        if($company->delete()){
            return response()->json([
                'message' => 'Company deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Company could not be deleted'
            ], 500);
        }
    }
}
