<?php

namespace App\Controller;

use App\Entity\Lesson;
use App\Repository\GradeRepository;
use App\Repository\LessonRepository;
use App\Repository\StudentRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LessonController extends AbstractController
{
    #[Route('/lesson', name: 'app_lesson')]
    public function index(LessonRepository $lesson): Response
    {
        $lessons = $lesson->findAll();
        
        return $this->render('lesson/index.html.twig', [
            'lessons' => $lessons
        ]);
    }

    #[Route('/{id}/lesson', name: 'app_lesson_detail', methods: ['GET'])]
    public function show(Lesson $lesson,StudentRepository $studentRepository,GradeRepository $grade): Response
    {
        // $students = $studentRepository->findBy(['id' => 'DESC']);
        $students = $studentRepository->findBy(array(),array('createdAt'=>'DESC'),3,0);
        return $this->render('lesson/detail.html.twig', [
            'lesson' => $lesson,
            'students' => $students
        ]);
    }
 }
