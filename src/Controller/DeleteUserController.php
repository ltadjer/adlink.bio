<?php

namespace App\Controller;

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
use Symfony\Component\Routing\Annotation\Route;

class DeleteUserController extends AbstractController
{
    #[Route('/{id}/delete', name: 'app_deleteUser')]
    public function deleteUser($id, UserRepository $user, SectionCompanyRepository $companyRepository, SectionVideoRepository $videoRepository, SectionDiscountRepository $discountRepository, SectionLinkRepository $sectionLinkRepository, SectionNetworkRepository $sectionNetworkRepository, NetworkRepository $networkRepository, CodeRepository $codeRepository, LinkRepository $linkRepository, ManagerRegistry $doctrine) {
	$em = $doctrine->getManager();

	$removeUser = $user->find($id);
	$removeSectionCompany = $companyRepository->findOneBy(['user' => $id]);
	$removeSectionLink = $sectionLinkRepository->findOneBy(['user' => $id]);
	$removeSectionVideo = $videoRepository->findOneBy(['user' => $id]);
	$removeSectionDiscount = $discountRepository->findOneBy(['user' => $id]);
	$removeSectionNetwork = $sectionNetworkRepository->findOneBy(['user' => $id]);
	$removeCodes = $codeRepository->findBy(['user' => $id]);
	$removeLinks = $linkRepository->findBy(['user' => $id]);
	$removeNetwork = $networkRepository->findOneBy(['user' => $id]);

	$em->remove($removeUser);
	$em->remove($removeSectionCompany);
	$em->remove($removeSectionLink);
	$em->remove($removeSectionVideo);
	$em->remove($removeSectionDiscount);
	$em->remove($removeSectionNetwork);
	$em->remove($removeNetwork);

    if (isset($removeCodes)) {
        foreach ($removeCodes as $removeCode){
            $em->remove($removeCode);  
        }
    }
    if (isset($removeLink)) {
        foreach ($removeLinks as $removeLink){
            $em->remove($removeLink);  
        }
    }

	$em->flush();

    return $this->redirectToRoute('app_home');
    }

    #[Route('/{id}/deleteAdmin', name: 'app_deleteUserAdmin')]
    public function deleteUserAdmin($id, UserRepository $user, SectionCompanyRepository $companyRepository, SectionVideoRepository $videoRepository, SectionDiscountRepository $discountRepository, SectionLinkRepository $sectionLinkRepository, SectionNetworkRepository $sectionNetworkRepository, NetworkRepository $networkRepository, CodeRepository $codeRepository, LinkRepository $linkRepository, ManagerRegistry $doctrine) {
	$em = $doctrine->getManager();
	
    $removeUser = $user->find($id);
	$removeSectionCompany = $companyRepository->findOneBy(['user' => $id]);
	$removeSectionLink = $sectionLinkRepository->findOneBy(['user' => $id]);
	$removeSectionVideo = $videoRepository->findOneBy(['user' => $id]);
	$removeSectionDiscount = $discountRepository->findOneBy(['user' => $id]);
	$removeSectionNetwork = $sectionNetworkRepository->findOneBy(['user' => $id]);
	$removeCodes = $codeRepository->findBy(['user' => $id]);
	$removeLinks = $linkRepository->findBy(['user' => $id]);
	$removeNetwork = $networkRepository->findOneBy(['user' => $id]);

	$em->remove($removeUser);
	$em->remove($removeSectionCompany);
	$em->remove($removeSectionLink);
	$em->remove($removeSectionVideo);
	$em->remove($removeSectionDiscount);
	$em->remove($removeSectionNetwork);
	$em->remove($removeNetwork);

    if (isset($removeCodes)) {
        foreach ($removeCodes as $removeCode){
            $em->remove($removeCode);  
        }
    }
    if (isset($removeLink)) {
        foreach ($removeLinks as $removeLink){
            $em->remove($removeLink);  
        }
    }

	$em->flush();

    return $this->redirectToRoute('app_admin');
    }

}
