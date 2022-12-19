<?php

namespace App\Controller;

use App\Entity\Code;
use App\Entity\Link;
use App\Entity\Network;
use App\Entity\SectionCompany;
use App\Entity\SectionDiscount;
use App\Entity\SectionLink;
use App\Entity\SectionNetwork;
use App\Entity\SectionVideo;
use App\Entity\User;
use App\Form\CodeType;
use App\Form\FontType;
use App\Form\LinkType;
use App\Form\NetworkType;
use App\Form\VideoType;
use App\Form\CompanyType;
use App\Form\DiscountStyleType;
use App\Form\LinkStyleType;
use App\Form\NetworkStyleType;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function adminUser( UserRepository $user, $slug, Request $request, ManagerRegistry $doctrine): Response
    {
        //entité à apart pour les typos ?

        $company = new SectionCompany();
        $video = new SectionVideo();
        $code = new Code();
        $discountStyle = new SectionDiscount();
        $link = new Link();
        $network = new Network();
        $linkStyle = new SectionLink();
        $networkStyle = new SectionNetwork();

        

        
        $slugUser = $user->findOneBy(['slug' => $slug]);

        $font = $user->find($slugUser);


        $formFont = $this->createForm(FontType::class, $font);

        $formCompany = $this->createForm(CompanyType::class, $company);

        $formVideo = $this->createForm(VideoType::class, $video);

        $formCode = $this->createForm(CodeType::class, $code);
        $formDiscountStyle = $this->createForm(DiscountStyleType::class, $discountStyle);

        $formLink = $this->createForm(LinkType::class, $link);
        $formLinkStyle = $this->createForm(LinkStyleType::class, $linkStyle);


        $formNetwork = $this->createForm(NetworkType::class, $network);
        $formNetworkStyle = $this->createForm(NetworkStyleType::class, $networkStyle);

        $formFont->handleRequest($request);
        $formCompany->handleRequest($request);
        $formVideo->handleRequest($request);
        $formCode->handleRequest($request);
        $formLink->handleRequest($request);
        $formLinkStyle->handleRequest($request);
        $formNetwork->handleRequest($request);
        $formNetworkStyle->handleRequest($request);

        
        if ($formFont->isSubmitted()) {
			$em = $doctrine->getManager();
			$em->persist($font);
			$em->flush();
		}
		if ($formCompany->isSubmitted()) {
			$em = $doctrine->getManager();
			$em->persist($company);
			$em->flush();
		}
        if ($formVideo->isSubmitted()) {
			$em = $doctrine->getManager();
			$em->persist($video);
			$em->flush();
		}
        if ($formCode->isSubmitted()) {
			$em = $doctrine->getManager();
			$em->persist($code);
			$em->flush();
		}
        if ($formLink->isSubmitted()) {
			$em = $doctrine->getManager();
			$em->persist($link);
			$em->flush();
		}
        if ($formLinkStyle->isSubmitted()) {
			$em = $doctrine->getManager();
			$em->persist($linkStyle);
			$em->flush();
		}
        if ($formNetwork->isSubmitted()) {
			$em = $doctrine->getManager();
			$em->persist($network);
			$em->flush();
		}
        if ($formNetworkStyle->isSubmitted()) {
			$em = $doctrine->getManager();
			$em->persist($networkStyle);
			$em->flush();
		}
        return $this->render('dashboard/user.html.twig', [
            "user" => $slugUser,

            'formFont' => $formFont->createView(),

            'formCompany' => $formCompany->createView(),

            'formVideo' => $formVideo->createView(),

            'formCode' => $formCode->createView(),

            'formDiscountStyle' => $formDiscountStyle->createView(),

            'formLink' => $formLink->createView(),
            'formLinkStyle' => $formLinkStyle->createView(),


            'formNetwork' => $formNetwork->createView(),
            'formNetworkStyle' => $formNetworkStyle->createView(),
        ]);
    }
}
