<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    #[Route('/connexion', priority: 1, name: 'app_login')]
    public function index(UserRepository $user, AuthenticationUtils $authenticationUtils): Response {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        $user = $this->getUser();
    
        return $this->render('login/index.html.twig', [
            'user' => $user,
            'last_username' => $lastUsername,
            'error'         => $error,
      ]);
    }
}
