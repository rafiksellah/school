<?php

namespace App\Controller;

use App\Entity\School;
use App\Repository\LessonRepository;
use App\Repository\SchoolRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class SchoolController extends AbstractController
{
    #[Route('/school', name: 'app_school')]
    public function index(SchoolRepository $school): Response
    {
        $schools = $school->findAll();

        return $this->render('school/index.html.twig', [
            'schools' => $schools,
        ]);
    }

    #[Route('/{id}/school', name: 'app_school_detail', methods: ['GET'])]
    public function show(School $school, LessonRepository $lesson,$id, Request $request): Response
    {
        // $id = $request->query->get('id');
        $lessons = $lesson->findBy(['school' => $id]);
        // $students = $studentRepository->findBy(array(),array('createdAt'=>'DESC'),3,0);
        return $this->render('school/detail.html.twig', [
            'lessons' => $lessons,
            'school' => $school
        ]);
    }
}
