<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DepartmentController extends AbstractController
{
    /**
     * @Route("/department", name="department")
     */
    public function index(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/DepartmentController.php',
        ]);
    }

    /**
     * @Route("/department/add", name="department_add")
     */
    public function AddDepartment(): Response
    {
        return $this->render('department/add.html.twig');
    }
}
