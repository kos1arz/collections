<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompetitionController extends AbstractController
{
    #[Route('/lista-zawodów', name: 'competition')]
    public function index(): Response
    {
        return $this->render('competition/index.html.twig');
    }
}
