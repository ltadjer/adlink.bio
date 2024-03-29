<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
        ]);
    }
    
    #[Route('/politque-de-confidentialite', priority: 1, name: 'app_confidentialite')]
    public function confidentialite(): Response
    {
        return $this->render('home/confidentialite.html.twig');
    }

    #[Route('/mentions-legales', priority: 1, name: 'app_mentions')]
    public function mentions(): Response
    {
        return $this->render('home/mentions.html.twig');
    }
}
