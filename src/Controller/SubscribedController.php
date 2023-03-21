<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SubscribedController extends AbstractController
{
    #[Route('/subscribed', name: 'app_subscribed')]
    public function index(): Response
    {
        return $this->render('subscribed/index.html.twig', [
            'controller_name' => 'SubscribedController',
        ]);
    }
}
