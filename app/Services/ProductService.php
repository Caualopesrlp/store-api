<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Auth;

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
        $this->ensureOwnership($product);

        return $this->repository->update($product, $data);
    }

    public function delete(Product $product): bool
    {
        $this->ensureOwnership($product);

        return $this->repository->delete($product);
    }

    private function ensureOwnership(Product $product): void
    {
        if ($product->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
    }
}