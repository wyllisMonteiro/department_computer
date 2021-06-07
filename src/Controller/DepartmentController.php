<?php

namespace App\Controller;

use App\Entity\Department;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
    public function AddDepartment(Request $req): Response
    {
        if ($req->isMethod('POST')) {
            $depart = new Department();
            $depart->setName($req->get('department_name'));
            $depart->setDomaine($req->get('department_domaine'));

            $connex = $this->getDoctrine()->getManager();
            $connex->persist($depart);
            $connex->flush();
            return $this->render('department/list.html.twig');
        } else {
            return $this->render('department/add.html.twig');
        }
    }
}
