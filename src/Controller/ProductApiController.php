<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Psr\Log\LoggerInterface;

#[Route('/api/products')]
class ProductApiController extends AbstractController
{
    #[Route('', methods: ['GET'])]
    public function getCollection(ProductRepository $repository): Response
    {
        $products = $repository->findAll();

        if (!$products) {
            throw $this->createNotFoundException('Products not found');
        }

        return $this->json($products);
    }

    #[Route('/{id<\d+>}', name: 'get_product', methods: ['GET'])]
    public function get(int $id, ProductRepository $repository): Response
    {
        $product = $repository->find($id);
        if (!$product) {
            throw $this->createNotFoundException('Product not found');
        }
        return $this->json($product);
    }
}