<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class LanguageController extends AbstractController
{
    #[Route('/change-language/{locale}', name: 'change_language')]
    public function changeLanguage($locale, Request $request)
    {
        $request->getSession()->set('_locale', $locale);

        $referer = $request->headers->get('referer');
        return new RedirectResponse($referer ?: '/');
    }
}
