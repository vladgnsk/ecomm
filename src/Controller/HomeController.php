<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homepage(ProductRepository $repository): Response
    {
        $products = $repository->findAll();

        return $this->render('home/homepage.html.twig', [
            'products' => $products,
        ]);
    }
}