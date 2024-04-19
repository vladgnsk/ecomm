<?php

namespace App\Repository;

use App\Model\Product;
use App\Model\ProductStatusEnum;
use Psr\Log\LoggerInterface;

class ProductRepository
{
    public function __construct(private LoggerInterface $logger)
    {
    }
    public function findAll(): array
    {
        $this->logger->info("Retrieving products");

        return [
            new Product(
                1,
                'USS LeafyCruiser (NCC-0001)',
                'Garden',
                'Jean-Luc Pickles',
                ProductStatusEnum::IN_PROGRESS,
            ),
            new Product(
                2,
                'USS LeafyCruiser (NCC-0001)',
                'Garden',
                'Jean-Luc Pickles',
                ProductStatusEnum::WAITING,
            ),
            new Product(
                3,
                'USS Espresso (NCC-1234-W)',
                'Latte',
                'James T. Quick!',
                ProductStatusEnum::COMPLETED,
            )
        ];
    }

    public function find(int $id): ?Product
    {
        foreach ($this->findAll() as $product) {
            if ($product->getId() === $id) {
                return $product;
            }
        }
        return null;
    }
}