<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
// use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
// use Doctrine\ORM\EntityManagerInterface;
// use App\Entity\User;

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
    public function index(): Response
    {
        // $user = new User();
        // $user->setEmail('admin@test.pl');
        // $user->setRoles(['ROLE_ADMIN']);
        // $user->setPassword($this->passwordHasher->hashPassword(
        //     $user,
        //     'admin'
        // ));
        // $this->entityManager->persist($user);
        // $this->entityManager->flush();

        return $this->render('home/index.html.twig');
    }
}
