<?php

namespace App\Controller;

use App\Form\CompanyStyleType;
use App\Form\CompanyType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function admin(): Response
    {

        return $this->render('dashboard/admin.html.twig', [
        ]);
    }
    #[Route('/{slug}/admin', name: 'app_adminUser')]
    public function adminUser(UserRepository $user, $slug): Response
    {
        $slugUser = $user->findOneBy(['slug' => $slug]);
        $formCompany = $this->createForm(CompanyType::class);
        $formCompanyStyle = $this->createForm(CompanyStyleType::class);
        return $this->render('dashboard/user.html.twig', [
            "user" => $slugUser,
            'formCompany' => $formCompany->createView(),
            'formCompanyStyle' => $formCompanyStyle->createView()
        ]);
    }
}
