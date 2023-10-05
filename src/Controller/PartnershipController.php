<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PartnershipController extends AbstractController
{
    #[Route('/partnerstwo', name: 'partnership')]
    public function list(): Response
    {
        return $this->render('partnership/index.html.twig');
    }
}
