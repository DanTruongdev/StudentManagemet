<?php

namespace App\Controller;

use App\Entity\Classes;
use App\Repository\ClassesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/classes')]
class ClassesController extends AbstractController
{
    #[Route('/', name: 'classes_index')]
    public function classesIndex()
    {
        $classes = $this->getDoctrine()->getRepository(Classes::class)->findAll();
        return $this->render('classes/index.html.twig', [
            'classes' => $classes,
        ]);
    }

    #[Route('/detail/{id}', name: 'classes_detail')]
    public function classesDetail($id)
    {
        $class = $this->getDoctrine()->getRepository(Classes::class)->find($id);
        if ($class == null) {
            $this->addFlash("Error", "This classes not found!");
            return $this->redirectToRoute('classes_index');
        }
        return $this->render('classes/detail.html.twig', [
            'class' => $class,
        ]);
    }


    #[Route('/delete/{id}', name: 'classes_delete')]
    public function classesDelete($id)
    {
        $class = $this->getDoctrine()->getRepository(Classes::class)->find($id);
        if ($class == null) {
            $this->addFlash("Error", "This classes not found!");
        } else {
            $manager = $this->getDoctrine()->getManager();
            $manager->remove($class);
            $manager->flush();
            $this->addFlash("Success", "Delete classes successful!");
        }
        return $this->redirectToRoute('classes_index');
    }

    #[Route('/asc', name: 'classes_asc')]
    public function sortAsc(ClassesRepository $repository)
    {
        $classes = $repository->sortNameByAscending();
        return $this->render('classes/index.html.twig', [
            'classes' => $classes
        ]);
    }

    #[Route('/desc', name: 'classes_desc')]
    public function sortDesc(ClassesRepository $repository)
    {
        $classes = $repository->sortNameByDescending();
        return $this->render('classes/index.html.twig', [
            'classes' => $classes
        ]);
    }
}
