<?php

namespace App\Controller;

use App\Form\CodeStyleType;
use App\Form\CodeType;
use App\Form\CompanyStyleType;
use App\Form\CompanyType;
use App\Form\FontType;
use App\Form\LinkStyleType;
use App\Form\LinkType;
use App\Form\NetworkStyleType;
use App\Form\NetworkType;
use App\Form\VideoStyleType;
use App\Form\VideoType;
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

        $formFont = $this->createForm(FontType::class);

        $formCompany = $this->createForm(CompanyType::class);
        $formCompanyStyle = $this->createForm(CompanyStyleType::class);

        $formVideo = $this->createForm(VideoType::class);
        $formVideoStyle = $this->createForm(VideoStyleType::class);

        $formCode = $this->createForm(CodeType::class);
        $formCodeStyle = $this->createForm(CodeStyleType::class);

        $formLink = $this->createForm(LinkType::class);
        $formLinkStyle = $this->createForm(LinkStyleType::class);

        $formNetwork = $this->createForm(NetworkType::class);
        $formNetworkStyle = $this->createForm(NetworkStyleType::class);


        return $this->render('dashboard/user.html.twig', [
            "user" => $slugUser,

            'formFont' => $formFont->createView(),

            'formCompany' => $formCompany->createView(),
            'formCompanyStyle' => $formCompanyStyle->createView(),

            'formVideo' => $formVideo->createView(),
            'formVideoStyle' => $formVideoStyle->createView(),

            'formCode' => $formCode->createView(),
            'formCodeStyle' => $formCodeStyle->createView(),

            'formLink' => $formLink->createView(),
            'formLinkStyle' => $formLinkStyle->createView(),

            'formNetwork' => $formNetwork->createView(),
            'formNetworkStyle' => $formNetworkStyle->createView()
        ]);
    }
}
