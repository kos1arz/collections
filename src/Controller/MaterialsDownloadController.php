<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MaterialsDownloadController extends AbstractController
{
    #[Route('/materialy-do-pobrania', name: 'materials_download')]
    public function index(): Response
    {
        return $this->render('materialsDownload/index.html.twig');
    }
}
