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
use App\Repository\NetworkRepository;
use App\Repository\SectionCompanyRepository;
use App\Repository\SectionDiscountRepository;
use App\Repository\SectionLinkRepository;
use App\Repository\SectionNetworkRepository;
use App\Repository\SectionVideoRepository;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function admin(UserRepository $userRepository): Response
    {
        $users = $userRepository->findAll();

        // Faire fonction delete pour un user

        return $this->render('dashboard/admin.html.twig', [
            'users' => $users
        ]);
    }




    #[Route('/{slug}/admin', name: 'app_adminUser')]
    public function adminUser( UserRepository $userRepository, SectionCompanyRepository $companyRepository, SectionVideoRepository $videoRepository, SectionDiscountRepository $discountRepository, SectionLinkRepository $sectionLinkRepository, SectionNetworkRepository $sectionNetworkRepository, NetworkRepository $networkRepository,  $slug, Request $request, ManagerRegistry $doctrine): Response
    {

        
        $user = $userRepository->findOneBy(['slug' => $slug]);

        $font = $userRepository->find($user);

        $idUser = $user -> getId();
        // $company = new SectionCompany();

        // Recherche par l'Id de user et non Id de la section
        $company = $companyRepository->findOneBy(['user' => $idUser]);
        
        // $video = new SectionVideo();
        $video = $videoRepository->findOneBy(['user' => $idUser]);

        $code = new Code();
        // $discountStyle = new SectionDiscount();
        $discountStyle = $discountRepository->findOneBy(['user' => $idUser]);
        
        $link = new Link();
        // $linkStyle = new SectionLink();
        $linkStyle = $sectionLinkRepository->findOneBy(['user' => $idUser]);

        $network = $networkRepository->findOneBy(['user' => $idUser]);
        $networkStyle = $sectionNetworkRepository->findOneBy(['user' => $idUser]);
        // $network = new Network();
        // $networkStyle = new SectionNetwork();


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
        $formDiscountStyle->handleRequest($request);
        $formLink->handleRequest($request);
        $formLinkStyle->handleRequest($request);
        $formNetwork->handleRequest($request);
        $formNetworkStyle->handleRequest($request);

        
        // Envoie du formulaire TYPO
        if ($formFont->isSubmitted()) {
			$em = $doctrine->getManager();
			$em->persist($font);
			$em->flush();
		}

        // Envoie du formulaire COMPANY INFO + STYLE
		if ($formCompany->isSubmitted()) {
            // $company->setUser($user);
			$em = $doctrine->getManager();
			// $em->persist($company);
			$em->flush();
            // if ($formCompany['logo']== null){
            //     $formCompany['logo']== 'test';
            // }
            // test d'une valeur par défault

		}

        // Envoie du formulaire VIDEO INFO + STYLE
        if ($formVideo->isSubmitted()) {
            $video->setUser($user);
			$em = $doctrine->getManager();
			$em->persist($video);
			$em->flush();
		}

        // Envoie du formulaire CODE INFO
        if ($formCode->isSubmitted()) {
            $code->setUser($user);
			$em = $doctrine->getManager();
			$em->persist($code);
			$em->flush();
		}

        // Envoie du formulaire DISCOUNT STYLE
        if ($formDiscountStyle->isSubmitted()) {
            // $discountStyle->setUser($user);
			$em = $doctrine->getManager();
			// $em->persist($discountStyle);
			$em->flush();
		}

        // Envoie du formulaire LINK INFO
        if ($formLink->isSubmitted()) {
            $link->setUser($user);
			$em = $doctrine->getManager();
			$em->persist($link);
			$em->flush();
		}

        // Envoie du formulaire LINK STYLE
        if ($formLinkStyle->isSubmitted()) {
            // $linkStyle->setUser($user);
			$em = $doctrine->getManager();
			// $em->persist($linkStyle);
			$em->flush();
		}

        // // Envoie du formulaire NETWORK INFO
        if ($formNetwork->isSubmitted()) {
            // $network->setUser($user);
			$em = $doctrine->getManager();
			// $em->persist($network);
			$em->flush();
		}

        // // Envoie du formulaire NETWORK STYLE
        if ($formNetworkStyle->isSubmitted()) {
            // $networkStyle->setUser($user);
			$em = $doctrine->getManager();
			// $em->persist($networkStyle);
			$em->flush();
		}

        
        return $this->render('dashboard/user.html.twig', [
            "user" => $user,

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
