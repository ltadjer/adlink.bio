<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LandingPageController extends AbstractController
{
    #[Route('/{slug}', name: 'app_landing')]
    public function index(UserRepository $user, $slug): Response
    {
        $slugUser = $user->findOneBy(['slug' => $slug]);
        return $this->render('landing_page/index.html.twig', [
            "user" => $slugUser
        ]);
    }
}
