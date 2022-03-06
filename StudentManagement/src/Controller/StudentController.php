<?php

namespace App\Controller;

use App\Entity\Student;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/student")
 */

class StudentController extends AbstractController
{
    /**
     * @Route("/", name="student_index")
     */
    public function studentIndex()
    {
        $student = $this->getDoctrine()->getRepository(Student::class)->findAll();

        return $this->render('student/index.html.twig', [
            'students' => $student,
        ]);
    }

    /**
     * @Route("/detail/{id}", name="student_detail")
     */
    public function studentDetail($id)
    {
        $student = $this->getDoctrine()->getRepository(Student::class)->find($id);
        return $this->render('student/index.html.twig', [
            'students' => $student,
        ]);
    }
}
