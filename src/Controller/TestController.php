<?php

namespace App\Controller;

use App\Repository\RecipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(RecipeRepository $repo): Response
    {
        return $this->render('test/index.html.twig', [
            'recipes' => $repo->findAll(),
        ]);
    }
}
