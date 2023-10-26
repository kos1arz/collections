<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    // private $entityManager;
    // private $passwordHasher;

    // public function __construct(EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher)
    // {
    //     $this->entityManager = $entityManager;
    //     $this->passwordHasher = $passwordHasher;
    // }

    #[Route('/', name: 'home')]
    public function index(Request $request): Response
    {
        return $this->render('home/index.html.twig');
    }
}
