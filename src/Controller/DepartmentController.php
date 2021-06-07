<?php

namespace App\Controller;

use App\Entity\Department;
use App\Repository\DepartmentRepository;
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
            return $this->redirectToRoute('department_list');
        } else {
            return $this->render('department/add.html.twig');
        }
    }

    /**
     * @Route("/departments", name="department_list")
     */
    public function GetDepartments(DepartmentRepository $repo, Request $req): Response
    {
        if ($req->isMethod('GET')) {
            $departments = $repo->findAll();
            return $this->render('department/list.html.twig', ['departments' => $departments]);
        }
    }

    /**
     * @Route("/departments/{departmentId}/update", name="department_update")
     */
    public function UpdateDepartment($departmentId, DepartmentRepository $repo, Request $req): Response
    {
        $department = $repo->find($departmentId);
        if ($req->isMethod('POST')) {
            $conn = $this->getDoctrine()->getManager();
            $department->setName($req->get('name'));
            $department->setDomaine($req->get('domaine'));
            $conn->persist($department);
            $conn->flush();
            return $this->redirectToRoute('department_list');
        } else {
            return $this->render('department/update.html.twig', ['department' => $department]);
        }
    }
}
