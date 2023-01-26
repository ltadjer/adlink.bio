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


        return $this->render('dashboard/admin.html.twig', [
            'users' => $users,
            'NbUsers' => $NbUsers
        ]);
    }


    #[Route('/admin', name: 'app_adminUser')]
    public function adminUser( UserRepository $user, SectionCompanyRepository $companyRepository, SectionVideoRepository $videoRepository, SectionDiscountRepository $discountRepository, SectionLinkRepository $sectionLinkRepository, SectionNetworkRepository $sectionNetworkRepository, NetworkRepository $networkRepository, CodeRepository $codeRepository, LinkRepository $linkRepository, Request $request, ManagerRegistry $doctrine, UserPasswordHasherInterface $userPasswordHasher): Response
    {

        
        // USER EDIT
        $user = $this->getUser();

        $formUser = $this->createForm(UserType::class, $user);
        $formUser->handleRequest($request);
        // Envoie du formulaire USER
        if ($formUser->isSubmitted() && $formUser->isValid()) {
            $em = $doctrine->getManager();
            if(($formUser->get('plainPassword')->getData()) ==! NULL) {
                $newPassword = $formUser->get('plainPassword')->getData();

                $hashOfNewPassword = $userPasswordHasher->hashPassword($user, $newPassword);
     
                $user->setPassword( $hashOfNewPassword );
            }
			$em->flush();
            return $this->redirectToRoute('app_adminUser', ['_fragment' => 'user']);
		}


        // FONT EDIT
        $formFont = $this->createForm(FontType::class, $user);
        $formFont->handleRequest($request);
        // Envoie du formulaire TYPO
        if ($formFont->isSubmitted()) {
			$em = $doctrine->getManager();
			$em->flush();
            return $this->redirectToRoute('app_adminUser', ['_fragment' => 'title']);
		}


        // COMPANY EDIT
        // Recherche par l'Id de user et non Id de la section
        $company = $companyRepository->findOneBy(['user' => $user]);
        $formCompany = $this->createForm(CompanyType::class, $company);
        $formCompany->handleRequest($request);
        // Envoie du formulaire COMPANY INFO + STYLE
		if ($formCompany->isSubmitted() && $formCompany->isValid()) {
			$em = $doctrine->getManager();
			$em->flush();
            return $this->redirectToRoute('app_adminUser', ['_fragment' => 'company']);
		}


        // VIDEO EDIT
        // Recherche par l'Id de user et non Id de la section
        $video = $videoRepository->findOneBy(['user' => $user]);
        $formVideo = $this->createForm(VideoType::class, $video);
        $formVideo->handleRequest($request);
        // Envoie du formulaire VIDEO INFO + STYLE
        if ($formVideo->isSubmitted() && $formVideo->isValid()) {
			$em = $doctrine->getManager();
			$em->flush();
            return $this->redirectToRoute('app_adminUser', ['_fragment' => 'video']);
		}


        // CODES TABLEAU
        // Recherche par l'Id de user et non Id de la section
        $codes = $codeRepository->findBy(['user' => $user]);


        // CODE AJOUT NOUVEAU
        $code = new Code();
        $formCode = $this->createForm(CodeType::class, $code);
        $formCode->handleRequest($request);
        // Envoie du formulaire CODE INFO NOUVEAU
        if ($formCode->isSubmitted() && $formCode->isValid()) {
            $code->setUser($user);
			$em = $doctrine->getManager();
			$em->persist($code);
			$em->flush();
            return $this->redirectToRoute('app_adminUser', ['_fragment' => 'discount']);
		}


        // DISCOUNT EDIT
        // Recherche par l'Id de user et non Id de la section
        $discountStyle = $discountRepository->findOneBy(['user' => $user]);
        $formDiscountStyle = $this->createForm(DiscountStyleType::class, $discountStyle);
        $formDiscountStyle->handleRequest($request);
        // Envoie du formulaire DISCOUNT STYLE
        if ($formDiscountStyle->isSubmitted() && $formDiscountStyle->isValid()) {
			$em = $doctrine->getManager();
			$em->flush();
            return $this->redirectToRoute('app_adminUser', ['_fragment' => 'discount']);
		}
        

        // LIENS TABLEAU
        // Recherche par l'Id de user et non Id de la section
        $links = $linkRepository->findBy(['user' => $user]);


        // LIEN AJOUT NOUVEAU
        $link = new Link();
        $formLink = $this->createForm(LinkType::class, $link);
        $formLink->handleRequest($request);
        // Envoie du formulaire LINK INFO NOUVEAU
        if ($formLink->isSubmitted() && $formLink->isValid()) {
            $link->setUser($user);
			$em = $doctrine->getManager();
			$em->persist($link);
			$em->flush();
            return $this->redirectToRoute('app_adminUser', ['_fragment' => 'discount']);
		}
        

        // LIEN EDIT
        // Recherche par l'Id de user et non Id de la section
        $linkStyle = $sectionLinkRepository->findOneBy(['user' => $user]);
        $formLinkStyle = $this->createForm(LinkStyleType::class, $linkStyle);
        $formLinkStyle->handleRequest($request);
        // Envoie du formulaire LINK STYLE
        if ($formLinkStyle->isSubmitted() && $formLinkStyle->isValid()) {
			$em = $doctrine->getManager();
			$em->flush();
            return $this->redirectToRoute('app_adminUser', ['_fragment' => 'link']);
		}


        // NETWORK EDIT
        // Recherche par l'Id de user et non Id de la section
        $network = $networkRepository->findOneBy(['user' => $user]);
        $formNetwork = $this->createForm(NetworkType::class, $network);
        $formNetwork->handleRequest($request);
        // // Envoie du formulaire NETWORK INFO
        if ($formNetwork->isSubmitted() && $formNetwork->isValid()) {
			$em = $doctrine->getManager();
			$em->flush();
            return $this->redirectToRoute('app_adminUser', ['_fragment' => 'network']);
		}
        // Recherche par l'Id de user et non Id de la section
        $networkStyle = $sectionNetworkRepository->findOneBy(['user' => $user]);
        $formNetworkStyle = $this->createForm(NetworkStyleType::class, $networkStyle);
        $formNetworkStyle->handleRequest($request);
        // // Envoie du formulaire NETWORK STYLE
        if ($formNetworkStyle->isSubmitted() && $formNetworkStyle->isValid()) {
			$em = $doctrine->getManager();
			$em->flush();
            return $this->redirectToRoute('app_adminUser', ['_fragment' => 'network']);
		}
    

        // VISIBLE COMPANY
        $formVisibleCompany = $this->createForm(VisibleCompanyType::class, $company);
        $formVisibleCompany->handleRequest($request);
        if ($formVisibleCompany->isSubmitted()) {
			$em = $doctrine->getManager();
			$em->flush();
            return $this->redirectToRoute('app_adminUser', ['_fragment' => 'company']);
		}

        // VISIBLE VIDEO
        $formVisibleVideo = $this->createForm(VisibleVideoType::class, $video);
        $formVisibleVideo->handleRequest($request);
        if ($formVisibleVideo->isSubmitted()) {
			$em = $doctrine->getManager();
			$em->flush();
            return $this->redirectToRoute('app_adminUser', ['_fragment' => 'video']);
		}

        // VISIBLE DISCOUNT
        $formVisibleDiscount = $this->createForm(VisibleDiscountType::class, $discountStyle);
        $formVisibleDiscount->handleRequest($request);
        if ($formVisibleDiscount->isSubmitted()) {
			$em = $doctrine->getManager();
			$em->flush();
            return $this->redirectToRoute('app_adminUser', ['_fragment' => 'discount']);
		}
        
        // VISIBLE LINK
        $formVisibleLink = $this->createForm(VisibleLinkType::class, $linkStyle);
        $formVisibleLink->handleRequest($request);
        if ($formVisibleLink->isSubmitted()) {
			$em = $doctrine->getManager();
			$em->flush();
            return $this->redirectToRoute('app_adminUser', ['_fragment' => 'link']);
		}
        
        // VISIBLE NETWORK
        $formVisibleNetwork = $this->createForm(VisibleNetworkType::class, $networkStyle);
        $formVisibleNetwork->handleRequest($request);
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

    return $this->redirectToRoute('app_adminUser', ['_fragment' => 'discount']);
    }

    #[Route('/{id}/deleteLink', name: 'app_deleteLink')]
    public function deleteLink($id, LinkRepository $link, ManagerRegistry $doctrine) {
	$em = $doctrine->getManager();
    $removeLink = $link->find($id);
	$em->remove($removeLink);
	$em->flush();

    return $this->redirectToRoute('app_adminUser', ['_fragment' => 'link']);
    }

    #[Route('/{name}/{id}/deleteNetwork', name: 'app_deleteNetwork')]
    public function deleteNetwork($name, $id, NetworkRepository $networkRepository, ManagerRegistry $doctrine) {
	$em = $doctrine->getManager();
    $network = $networkRepository->findOneBy(['user' => $id]);
    if($name=='instagram') {
        $network->setInstagram("");
    }elseif($name=='facebook') {
        $network->setFacebook("");
    }elseif($name=='youtube')  {
        $network->setYoutube("");
    }elseif($name=='gitHub')  {
        $network->setGitHub("");
    }elseif($name=='twitter')  {
        $network->setTwitter("");
    }elseif($name=='TikTok')  {
        $network->setTikTok("");
    }
	$em->flush();

    return $this->redirectToRoute('app_adminUser', ['_fragment' => 'network']);
    }
}