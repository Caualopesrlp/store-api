<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(protected ProductService $service) {}

    public function index(Request $request)
    {
        return response()->json([
            'data' => ProductResource::collection(
                $this->service->listByUser($request->user()->id)
            )
        ]);
    }

    public function store(StoreProductRequest $request)
    {
        $product = $this->service->create(
            $request->validated(),
            $request->user()->id
        );

        return response()->json([
            'message' => 'Produto criado com sucesso',
            'data' => new ProductResource($product)
        ]);
    }

    public function update(StoreProductRequest $request, Product $product)
    {
        $updated = $this->service->update($product, $request->validated());

        return response()->json([
            'message' => 'Produto atualizado com sucesso',
            'data' => $updated
        ]);
    }

    public function destroy(Product $product)
    {
        $this->service->delete($product);

        return response()->json([
            'message' => 'Produto deletado com sucesso'
        ]);
    }
}
