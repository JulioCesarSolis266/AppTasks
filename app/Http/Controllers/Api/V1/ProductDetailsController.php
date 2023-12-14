<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\ProductDetailResource;
use App\Models\ProductDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    public function index()
    {
        $relation = ProductDetail::with(['closure', 'cost'])->orderBy('id')->get();
        return $relation;
    }
    public function store(Request $request)
    {
        return new ProductDetailResource(ProductDetail::create($request->all()));
    }
    public function show(ProductDetail $productDetail)
    {
        return new ProductDetailResource($productDetail);
    }
    public function update(Request $request, ProductDetail $productDetail)
    {
        if($productDetail->update($request->all())){
            return response()->json([
                'message' => 'ProductDetail updated successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'ProductDetail could not be updated'
            ], 500);
        }
    }
    public function destroy(ProductDetail $productDetail)
    {
        if($productDetail->delete()){
            return response()->json([
                'message' => 'ProductDetail deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'ProductDetail could not be deleted'
            ], 500);
        }
    }
}
