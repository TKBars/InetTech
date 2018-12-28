<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Mark;

class MarkController extends Controller
{
    /**
     * @Route("/mark", name="mark")
     */
    public function index()
    {
//        $cur_user = $this->getUser()->getUsername();
//
//        $entityManager = $this->getDoctrine()->getManager();
//        $marks = $entityManager->getRepository(Mark::class)->findBy(['user' => $cur_user]);

        return $this->render('mark/index.html.twig', [
            'controller_name' => 'MarkController',
        ]);
    }

    /**
     * @Route("/mark/show", name="markShow")
     */
    public function showAll()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $marks = $entityManager->getRepository(Mark::class)->findAll();
//        var_dump($marks);
        return $this->render('mark/showMarks.html.twig', [
            'marks' => $marks,
        ]);
    }

    /**
     * @Route("/mark/delete/{id}", methods={"GET"})
     */
    public function delMark(Request $request, $id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $mark = $this->getDoctrine()->getRepository(Mark::class)->find($id);
        $entityManager->remove($mark);
        $entityManager->flush();
        $response = new Response();
        return $response;
    }
}
