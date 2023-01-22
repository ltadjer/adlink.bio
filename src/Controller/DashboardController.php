<?php

namespace App\Controller;

use App\Entity\Code;
use App\Entity\Link;
use App\Form\CodeType;
use App\Form\FontType;
use App\Form\LinkType;
use App\Form\NetworkType;
use App\Form\VideoType;
use App\Form\CompanyType;
use App\Form\DiscountStyleType;
use App\Form\LinkStyleType;
use App\Form\NetworkStyleType;
use App\Form\UserType;
use App\Form\VisibleCompanyType;
use App\Form\VisibleDiscountType;
use App\Form\VisibleLinkType;
use App\Form\VisibleNetworkType;
use App\Form\VisibleVideoType;
use App\Repository\CodeRepository;
use App\Repository\LinkRepository;
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
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/ADLadmin', name: 'app_admin')]
    public function admin(UserRepository $userRepository): Response
    {
        $users = $userRepository->findAll();
        $NbUsers = count($users);

        // Faire fonction delete pour un user

        return $this->render('dashboard/admin.html.twig', [
            'users' => $users,
            'NbUsers' => $NbUsers
        ]);
    }


    #[Route('/admin', name: 'app_adminUser')]
    public function adminUser( UserRepository $user, SectionCompanyRepository $companyRepository, SectionVideoRepository $videoRepository, SectionDiscountRepository $discountRepository, SectionLinkRepository $sectionLinkRepository, SectionNetworkRepository $sectionNetworkRepository, NetworkRepository $networkRepository, CodeRepository $codeRepository, LinkRepository $linkRepository, Request $request, ManagerRegistry $doctrine, UserPasswordHasherInterface $userPasswordHasher): Response
    {

        
    
        $user = $this->getUser();

        // Recherche par l'Id de user et non Id de la section
        $company = $companyRepository->findOneBy(['user' => $user]);
        
        $video = $videoRepository->findOneBy(['user' => $user]);

        $codes = $codeRepository->findBy(['user' => $user]);
        $code = new Code();

        $discountStyle = $discountRepository->findOneBy(['user' => $user]);
        
        $links = $linkRepository->findBy(['user' => $user]);
        $link = new Link();
        
        $linkStyle = $sectionLinkRepository->findOneBy(['user' => $user]);

        $network = $networkRepository->findOneBy(['user' => $user]);
        $networkStyle = $sectionNetworkRepository->findOneBy(['user' => $user]);

        $formFont = $this->createForm(FontType::class, $user);

        $formCompany = $this->createForm(CompanyType::class, $company);

        $formVideo = $this->createForm(VideoType::class, $video);

        $formCode = $this->createForm(CodeType::class, $code);

        $formDiscountStyle = $this->createForm(DiscountStyleType::class, $discountStyle);

        $formLink = $this->createForm(LinkType::class, $link);
        $formLinkStyle = $this->createForm(LinkStyleType::class, $linkStyle);

        $formNetwork = $this->createForm(NetworkType::class, $network);
        $formNetworkStyle = $this->createForm(NetworkStyleType::class, $networkStyle);

        $formUser = $this->createForm(UserType::class, $user);

        $formVisibleCompany = $this->createForm(VisibleCompanyType::class, $company);
        $formVisibleVideo = $this->createForm(VisibleVideoType::class, $video);
        $formVisibleDiscount = $this->createForm(VisibleDiscountType::class, $discountStyle);
        $formVisibleLink = $this->createForm(VisibleLinkType::class, $linkStyle);
        $formVisibleNetwork = $this->createForm(VisibleNetworkType::class, $networkStyle);


        $formFont->handleRequest($request);
        $formCompany->handleRequest($request);
        $formVideo->handleRequest($request);
        $formCode->handleRequest($request);
        $formDiscountStyle->handleRequest($request);
        $formLink->handleRequest($request);
        $formLinkStyle->handleRequest($request);
        $formNetwork->handleRequest($request);
        $formNetworkStyle->handleRequest($request);
        $formUser->handleRequest($request);

        $formVisibleCompany->handleRequest($request);
        $formVisibleVideo->handleRequest($request);
        $formVisibleDiscount->handleRequest($request);
        $formVisibleLink->handleRequest($request);
        $formVisibleNetwork->handleRequest($request);

        
        // Envoie du formulaire TYPO
        if ($formFont->isSubmitted()) {
			$em = $doctrine->getManager();
			$em->persist($user);
			$em->flush();
            return $this->redirectToRoute('app_adminUser', ['_fragment' => 'title']);
		}

        // Envoie du formulaire COMPANY INFO + STYLE
		if ($formCompany->isSubmitted() && $formCompany->isValid()) {
			$em = $doctrine->getManager();
			$em->flush();
            return $this->redirectToRoute('app_adminUser', ['_fragment' => 'company']);
		}

        // Envoie du formulaire VIDEO INFO + STYLE
        if ($formVideo->isSubmitted() && $formVideo->isValid()) {
            $video->setUser($user);
			$em = $doctrine->getManager();
			$em->persist($video);
			$em->flush();
            return $this->redirectToRoute('app_adminUser', ['_fragment' => 'video']);

		}

        // Envoie du formulaire CODE INFO NOUVEAU
        if ($formCode->isSubmitted() && $formCode->isValid()) {
            $code->setUser($user);
			$em = $doctrine->getManager();
			$em->persist($code);
			$em->flush();
            return $this->redirectToRoute('app_adminUser', ['_fragment' => 'discount']);
		}

        // Envoie du formulaire DISCOUNT STYLE
        if ($formDiscountStyle->isSubmitted() && $formDiscountStyle->isValid()) {
			$em = $doctrine->getManager();
			$em->flush();
            return $this->redirectToRoute('app_adminUser', ['_fragment' => 'discount']);
		}

        // Envoie du formulaire LINK INFO NOUVEAU
        if ($formLink->isSubmitted() && $formLink->isValid()) {
            $link->setUser($user);
			$em = $doctrine->getManager();
			$em->persist($link);
			$em->flush();
            return $this->redirectToRoute('app_adminUser');
		}

        // Envoie du formulaire LINK STYLE
        if ($formLinkStyle->isSubmitted() && $formLinkStyle->isValid()) {
			$em = $doctrine->getManager();
			$em->flush();
            return $this->redirectToRoute('app_adminUser', ['_fragment' => 'link']);

		}

        // // Envoie du formulaire NETWORK INFO
        if ($formNetwork->isSubmitted() && $formNetwork->isValid()) {
			$em = $doctrine->getManager();
			$em->flush();
            return $this->redirectToRoute('app_adminUser', ['_fragment' => 'network']);

		}

        // // Envoie du formulaire NETWORK STYLE
        if ($formNetworkStyle->isSubmitted() && $formNetwork->isValid()) {
			$em = $doctrine->getManager();
			$em->flush();
            return $this->redirectToRoute('app_adminUser', ['_fragment' => 'network']);

		}

        // // Envoie du formulaire USER
        if ($formUser->isSubmitted() && $formUser->isValid()) {
            $em = $doctrine->getManager();
            $newPassword = $formUser->get('plainPassword')->getData();

            $hashOfNewPassword = $userPasswordHasher->hashPassword($user, $newPassword);
 
            $user->setPassword( $hashOfNewPassword );
			$em->flush();
            return $this->redirectToRoute('app_adminUser', ['_fragment' => 'user']);

		}

        // VISIBLE
        if ($formVisibleCompany->isSubmitted()) {
			$em = $doctrine->getManager();
			$em->flush();
            return $this->redirectToRoute('app_adminUser', ['_fragment' => 'company']);
		}
        if ($formVisibleVideo->isSubmitted()) {
			$em = $doctrine->getManager();
			$em->flush();
            return $this->redirectToRoute('app_adminUser', ['_fragment' => 'video']);
		}
        if ($formVisibleDiscount->isSubmitted()) {
			$em = $doctrine->getManager();
			$em->flush();
            return $this->redirectToRoute('app_adminUser', ['_fragment' => 'discount']);
		}
        if ($formVisibleLink->isSubmitted()) {
			$em = $doctrine->getManager();
			$em->flush();
            return $this->redirectToRoute('app_adminUser', ['_fragment' => 'link']);
		}
        if ($formVisibleNetwork->isSubmitted()) {
			$em = $doctrine->getManager();
			$em->flush();
            return $this->redirectToRoute('app_adminUser', ['_fragment' => 'network']);
		}

        
        return $this->render('dashboard/user.html.twig', [
            'user' => $user,

            'formFont' => $formFont->createView(),

            'formCompany' => $formCompany->createView(),

            'formVideo' => $formVideo->createView(),


            'codes' => $codes,
            'formCode' => $formCode->createView(),

            'formDiscountStyle' => $formDiscountStyle->createView(),

            'formLink' => $formLink->createView(),
            'links' => $links,
            'formLinkStyle' => $formLinkStyle->createView(),


            'formNetwork' => $formNetwork->createView(),
            'formNetworkStyle' => $formNetworkStyle->createView(),

            'formUser' => $formUser->createView(),

            'formVisibleCompany' => $formVisibleCompany->createView(),
            'formVisibleVideo' => $formVisibleVideo->createView(),
            'formVisibleDiscount' => $formVisibleDiscount->createView(),
            'formVisibleLink' => $formVisibleLink->createView(),
            'formVisibleNetwork' => $formVisibleNetwork->createView()
        ]);
    }


    #[Route('/{id}/deleteCode', name: 'app_deleteCode')]
    public function deleteCode($id, CodeRepository $code, ManagerRegistry $doctrine) {
	$em = $doctrine->getManager();
	
    $removeCode = $code->find($id);


	$em->remove($removeCode);

	$em->flush();

    return $this->redirectToRoute('app_adminUser');
    }

    #[Route('/{id}/deleteLink', name: 'app_deleteLink')]
    public function deleteLink($id, LinkRepository $link, ManagerRegistry $doctrine) {
	$em = $doctrine->getManager();
	
    $removeLink = $link->find($id);


	$em->remove($removeLink);

	$em->flush();

    return $this->redirectToRoute('app_adminUser');
    }
}