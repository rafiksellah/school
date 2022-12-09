<?php

namespace App\Controller\Admin;

use App\Entity\School;
use App\Form\SchoolType;
use App\Repository\SchoolRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/school')]
class SchoolController extends AbstractController
{
    #[Route('/', name: 'app_admin_school_index', methods: ['GET'])]
    public function index(SchoolRepository $schoolRepository): Response
    {
        return $this->render('admin/school/index.html.twig', [
            'schools' => $schoolRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_school_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SchoolRepository $schoolRepository): Response
    {
        $school = new School();
        $form = $this->createForm(SchoolType::class, $school);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $schoolRepository->save($school, true);

            return $this->redirectToRoute('app_admin_school_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/school/new.html.twig', [
            'school' => $school,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_school_show', methods: ['GET'])]
    public function show(School $school): Response
    {
        return $this->render('admin/school/show.html.twig', [
            'school' => $school,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_school_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, School $school, SchoolRepository $schoolRepository): Response
    {
        $form = $this->createForm(SchoolType::class, $school);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $schoolRepository->save($school, true);

            return $this->redirectToRoute('app_admin_school_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/school/edit.html.twig', [
            'school' => $school,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_school_delete', methods: ['POST'])]
    public function delete(Request $request, School $school, SchoolRepository $schoolRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$school->getId(), $request->request->get('_token'))) {
            $schoolRepository->remove($school, true);
        }

        return $this->redirectToRoute('app_admin_school_index', [], Response::HTTP_SEE_OTHER);
    }
}
