<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function allByUser(int $userId)
    {
        return Product::where('user_id', $userId)->get();
    }

    public function findById(int $id): ?Product
    {
        return Product::find($id);
    }

    public function create(array $data, int $userId): Product
    {
        return Product::create([
            ...$data,
            'user_id' => $userId
        ]);
    }

    public function update(Product $product, array $data): Product
    {
        $product->update($data);
        return $product;
    }

    public function delete(Product $product): bool
    {
        return $product->delete();
    }
}