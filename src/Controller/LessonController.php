<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Lesson;

class LessonController extends AbstractController
{
    /**
     * @Route("/lesson", name="lesson")
     */
    public function index()
    {
        $cur_user = $this->getUser()->getUsername();

        $entityManager = $this->getDoctrine()->getManager();
        $lessons = $entityManager->getRepository(Lesson::class)->findBy(['user' => $cur_user]);
//        var_dump($lessons);

//        foreach ($lessons as $lesson)
//        {
//            var_dump($lesson->getLesson());
//        }
        return $this->render('lesson/index.html.twig', [
            'controller_name' => 'LessonController',
            'lessons' =>  $lessons
        ]);
    }
}
