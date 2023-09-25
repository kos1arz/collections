<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StaffController extends AbstractController
{
    #[Route('/nasza-kadra', name: 'staff')]
    public function list(): Response
    {
        return $this->render('staff/index.html.twig');
    }
}
