<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function list(): JsonResponse
    {
        $products = Product::select(['id', 'name', 'image', 'price', 'old_price', 'description', 'qty'])->get();
        return response()->json(['products' => ProductResource::collection($products)]);
    }
}
