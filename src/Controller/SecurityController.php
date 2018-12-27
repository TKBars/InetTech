<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Security;

class SecurityController extends AbstractController
{    /**
     * @Route("/login", name="app_login")
     *
     */
    //@IsGranted("IS_AUTHENTICATED_FULLY")

    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $hasAccess = $this->isGranted('IS_AUTHENTICATED_FULLY');
        //var_dump($hasAccess);
        if ($hasAccess) return $this->redirect("/");
//
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }
}
