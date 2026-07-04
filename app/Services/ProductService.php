<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;

class ProductService
{
    public function __construct(
        protected ProductRepository $repository
    ) {}

    public function listByUser(int $userId)
    {
        return $this->repository->allByUser($userId);
    }

    public function create(array $data, int $userId): Product
    {
        return $this->repository->create($data, $userId);
    }

    public function update(Product $product, array $data): Product
    {
        return $this->repository->update($product, $data);
    }

    public function delete(Product $product): bool
    {
        return $this->repository->delete($product);
    }
}