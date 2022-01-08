<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function list(Request $request): JsonResponse
    {
        $categoryId = $request->get('category_id');
        $priceFrom = $request->get('price_from');
        $priceTo = $request->get('price_to');

        $products = Product::
        where(function ($query) use ($categoryId) {
            if ($categoryId)
                $query->where('category_id', $categoryId);
        })->where(function ($query) use ($priceFrom) {
            if ($priceFrom)
                $query->where('price', '>=', $priceFrom);
        })->where(function ($query) use ($priceTo) {
            if ($priceTo)
                $query->where('price', '<=', $priceTo);
        })->
        select(['id', 'name', 'image', 'price', 'old_price', 'description', 'qty', 'category_id'])->get();
        return response()->json(['products' => ProductResource::collection($products)]);
    }

    public function show(int $productId)
    {
        return response()->json(['product' => new ProductResource(Product::findOrFail($productId))]);
    }
}
