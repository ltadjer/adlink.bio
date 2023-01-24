<?php

namespace App\Controller;

use App\Entity\Network;
use App\Entity\SectionCompany;
use App\Entity\SectionDiscount;
use App\Entity\SectionLink;
use App\Entity\SectionNetwork;
use App\Entity\SectionVideo;
use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    #[Route('/inscription', priority: 1, name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {

        // CREATION USER
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
            $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );
            $user->setFont("Poppins");
            $entityManager->persist($user);
            $entityManager->flush();

            
            // CREATION COMPANY
            $em = $doctrine->getManager();
            $sectionCompany = new SectionCompany();
            $sectionCompany->setLogo("logo.svg");
            $sectionCompany->setTitle("Adlink");
            $sectionCompany->setBaseline("Baseline");
            $sectionCompany->setBgColor("#FFFFFF");
            $sectionCompany->setTitleColor("#009BE3");
            $sectionCompany->setBaselineColor("#000000");
            $sectionCompany->setVisible("0");
            $sectionCompany->setUser($user);
            $em->persist($sectionCompany);
            $em->flush();

            // CREATION VIDEO
            $em = $doctrine->getManager();
            $sectionVideo = new SectionVideo();
            $sectionVideo->setLink("https://www.youtube.com/watch?v=KDhLtvfFJ4k");
            $sectionVideo->setAltVideo("Vidéo de présentation Adlink");
            $sectionVideo->setBgColor("#009BE3");
            $sectionVideo->setVisible("0");
            $sectionVideo->setUser($user);
            $em->persist($sectionVideo);
            $em->flush();

            // CREATION DISCOUNT
            $em = $doctrine->getManager();
            $sectionDiscount = new SectionDiscount();
            $sectionDiscount->setBgColor("#FFFFFF");
            $sectionDiscount->setBgCodeColor("#FFFFFF");
            $sectionDiscount->setTextCodeColor("#009BE3");
            $sectionDiscount->setBgCardColor("#009BE3");
            $sectionDiscount->setTextCardColor("#000000");
            $sectionDiscount->setVisible("0");
            $sectionDiscount->setUser($user);
            $em->persist($sectionDiscount);
            $em->flush();

            // CREATION LINK
            $em = $doctrine->getManager();
            $sectionLink = new SectionLink();
            $sectionLink->setBgColor("#000000");
            $sectionLink->setBgBtnColor("#009BE3");
            $sectionLink->setTextBtnColor("#FFFFFF");
            $sectionLink->setVisible("0");
            $sectionLink->setUser($user);
            $em->persist($sectionLink);
            $em->flush();

            // CREATION NETWORK STYLE
            $em = $doctrine->getManager();
            $sectionNetwork = new SectionNetwork();
            $sectionNetwork->setBgColor("#FFFFFF");
            $sectionNetwork->setIconColor("#009BE3");
            $sectionNetwork->setVisible("0");
            $sectionNetwork->setUser($user);
            $em->persist($sectionNetwork);
            $em->flush();

            // CREATION NETWORK
            $em = $doctrine->getManager();
            $network = new Network();
            $network->setUser($user);
            $em->persist($network);
            $em->flush();


            return $this->redirectToRoute('app_login');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
