<?php

namespace App\Controller;

use App\Repository\LessonRepository;
use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(LessonRepository $lesson, StudentRepository $student): Response
    {
        
        $lessons =  $lesson->findBy(array(),array('id'=>'DESC'),3,0);
        $students =  $student->findAll();
        return $this->render('home/index.html.twig', [
            'lessons' => $lessons,
            'students' => $students
        ]);
    }
}
