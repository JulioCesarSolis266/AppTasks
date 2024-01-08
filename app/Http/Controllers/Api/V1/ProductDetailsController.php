<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\ProductDetailResource;
use App\Models\ProductDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductDetailsController extends Controller
{
    public function index()
    {
        $relation = ProductDetail::with(['task', 'cost'])->orderBy('id')->get();
        return $relation;
    }
    public function store(Request $request)
{
    try {
        $detail = $request->all();
        foreach ($detail['productDetails'] as $value) {
            $productDetail = new ProductDetail();
            $productDetail->product_id = $value['product_id'];
            $productDetail->task_id = $value['task_id'];
            $productDetail->count = $value['count'];
            $productDetail->subtotal = $value['subtotal'];
            $productDetail->save();
        }
        return response()->json([
            'message' => 'Producto Creado'
        ], 201);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}
    public function show(ProductDetail $product)//El nombre de la variable tiene que ser igual al nombre del parametro de la ruta. Si en la ruta dice products, aqui debe decir product y si dice product, aqui debe decir product.
    {
        $product = ProductDetail::with('task', 'cost')->find($product->id);
        return new ProductDetailResource($product);
    }
    public function update(Request $request, ProductDetail $product)
    {
        if($product->update($request->all())){
            return response()->json([
                'message' => 'ProductDetail updated successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'ProductDetail could not be updated'
            ], 500);
        }
    }
    public function destroy(ProductDetail $product)
    {
        if($product->delete()){
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
