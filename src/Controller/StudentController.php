<?php

namespace App\Controller;

use App\Entity\Student;
use App\Entity\SearchData;
use App\Form\SearchFormType;
use App\Repository\GradeRepository;
use App\Repository\StudentRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StudentController extends AbstractController
{
    #[Route('/student', name: 'app_student')]
    public function index(StudentRepository $student, Request $request): Response
    {
        $students = $student->findAll();
        $searchData = new SearchData();
        $form = $this->createForm (SearchFormType::class, $searchData);
        $form->handleRequest($request);
        $studentsSearchSearch= [];
        if($form->isSubmitted() && $form->isValid()) 
        {
             $firstName = $searchData->getFirstName();    
             if ($firstName!="" ) 
               $studentsSearch= $student->findBy(['firstName' => $firstName] );
             else   
               $studentsSearch= $student->findAll();
            }

        return $this->render('student/index.html.twig', [
            'students' => $students,
            'form' =>$form->createView()
        ]);
    }

    #[Route('/{id}/student', name: 'app_student_detail', methods: ['GET'])]
    public function show(Student $student,GradeRepository $grade): Response
    {
     
        // $students = $studentRepository->findBy(array(),array('createdAt'=>'DESC'),3,0);
        return $this->render('student/detail.html.twig', [
            'student' => $student
        ]);
    }
}
