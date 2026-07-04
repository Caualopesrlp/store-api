<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(protected ProductService $service) {}

    public function index(Request $request)
    {
        return response()->json([
            'data' => $this->service->listByUser($request->user()->id)
        ]);
    }

    public function store(StoreProductRequest $request)
    {
        $product = $this->service->create(
            $request->validated(),
            $request->user()->id
        );

        return response()->json([
            'message' => 'Product created',
            'data' => $product
        ]);
    }

    public function destroy(Product $product)
    {
        $this->service->delete($product);

        return response()->json([
            'message' => 'Product deleted'
        ]);
    }
}