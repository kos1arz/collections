<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HintsController extends AbstractController
{
    #[Route('/poradnik', name: 'hints')]
    public function list(): Response
    {
        return $this->render('hints/index.html.twig');
    }
}
