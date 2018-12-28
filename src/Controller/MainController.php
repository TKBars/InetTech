<?php

namespace App\Controller;

use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\ChangePassType;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index()
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }


    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
        $this->redirectToRoute('main');
    }

    /**
     * @Route("/change_pass", name="change_pass")
     */
    public function change_pass(Request $request,
                                UserPasswordEncoderInterface $passwordEncoder)
    {
        $userInfo = ['password' => null, 'plainPassword' => null];

        $form = $this->createForm(ChangePassType::class, $userInfo);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $username = $this->getUser()->getUsername();
            $user = new User();
            $userInfo = $form->getData();
            $oldPassword = $userInfo['password'];
            $plainPassword = $userInfo['plainPassword'];

//            $passwordHash = $passwordEncoder->encodePassword($user, $oldPassword);
//            var_dump($passwordHash);
//            echo("<br>");
//            var_dump($this->getUser()->getPassword());
            $user = $this->getUser();
            if ($passwordEncoder->isPasswordValid($user, $oldPassword))
            {
                $entityManager = $this->getDoctrine()->getManager();
//                $user = $entityManager->getRepository(User::class)->findOneBy(['username' => $username]);
//                var_dump($user);
//            var_dump($passwordEncoder->isPasswordValid($user, $oldPassword));
                $newPassword = $passwordEncoder->encodePassword($user, $plainPassword);

                $user->setPassword($newPassword);
                $entityManager->persist($user);
                $entityManager->flush();
//                echo ("ok");
            }
//            else
//            {
//                echo("неудача");
//                //return $this->redirectToRoute('change_pass');
//            }


            //return $this->redirectToRoute('main');
        }

        return $this->render('main/change_pass.html.twig', array('form' => $form->createView()));

    }
}
