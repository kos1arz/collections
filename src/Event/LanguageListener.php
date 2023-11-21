<?php

namespace App\EventListener;

use App\Entity\Language;
use Doctrine\ORM\Event\PreUpdateEventArgs;

class LanguageListener
{
    public function preUpdate(PreUpdateEventArgs $event): void
    {
        // $entity = $event->getObject();

        // if (!$entity instanceof Language && !$event->hasChangedField('default')) {
        //     return;
        // }

        // $entityManager = $event->getObjectManager();

        // $languageRepository = $entityManager->getRepository(Language::class);
        // $defaultLanguage = $languageRepository->findDefaultLanguage();
        // if($defaultLanguage) {
        //     /** @var Language $defaultLanguage */
        //     $defaultLanguage->setDefault(false);
        //     $entityManager->persist($defaultLanguage);
        //     $entityManager->flush();
        // }
        // /** @var Language $entity */
        // $entity->setDefault(true);
        // $entityManager->persist($entity);
        // $entityManager->flush();
    }
}
