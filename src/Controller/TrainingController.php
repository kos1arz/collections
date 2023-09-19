<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrainingController extends AbstractController
{
    #[Route('/szkolenia', name: 'training_list')]
    public function list(): Response
    {
        return $this->render('training/list/index.html.twig');
    }

    #[Route('/szkolenia/{id}', name: 'training_details', requirements: ['id' => '\d+'])]
    public function details(int $id): Response
    {
        return $this->render('training/details/index.html.twig');
    }
}
