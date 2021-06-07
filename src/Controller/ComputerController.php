<?php

namespace App\Controller;

use App\Repository\ComputerRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ComputerController extends AbstractController
{
    /**
     * @Route("/computer", name="computer")
     */
    public function index(): Response
    {
        return $this->render('computer/index.html.twig', [
            'controller_name' => 'ComputerController',
        ]);
    }

    /**
     * @Route("/computers", name="computer_list")
     */
    public function GetComputers(ComputerRepository $repo, Request $req): Response
    {
        if ($req->isMethod('GET')) {
            $computers = $repo->findAll();
            return $this->render('computer/list.html.twig', ['computers' => $computers]);
        }
    }
}
