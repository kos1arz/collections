<?php

namespace App\Service;

use App\Entity\Language;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class LanguageService
{
    public function __construct(
        private EntityManagerInterface $em,
        private RequestStack $requestStack
    ) {}

    public function getAvailableLanguages(): array
    {
        return $this->em->getRepository(Language::class)->findAll();
    }

    public function getCurrentLanguage()
    {
        $currentLocale = $this->requestStack->getCurrentRequest()->getLocale();
        return $this->em->getRepository(Language::class)->findOneBy(['code' => $currentLocale]);
    }
}
