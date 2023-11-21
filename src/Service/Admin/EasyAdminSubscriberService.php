<?php

declare(strict_types=1);

namespace App\Service\Admin;

use App\Entity\Country;
use App\Entity\Course;
use App\Entity\Language;
use App\Entity\Currency;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Abstract\ManyLanguagesAbstract;

class EasyAdminSubscriberService
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {}

    public function afterBuilt(ManyLanguagesAbstract $entity): void
    {
        $parts = explode('\\', get_class($entity));
        $className = strtolower(end($parts));
        $entity->creatChildLanguage();
        $courseLanguage = $this->entityManager
            ->getRepository(get_class($entity->getChildLanguage()))
            ->findOneBy([
                $className => $entity,
                'language' => $this->getLanguage()
            ]);

        if($courseLanguage) {
            $entity->setChildLanguage($courseLanguage);
        }
    }

    public function beforeCreate(ManyLanguagesAbstract $entity): void
    {
        $entity->setLanguage($this->getLanguage());

        if($entity instanceof Course) {
            $entity->setCurrency($this->getCurrency($entity->getCountry()));
        }
    }

    public function afterCreate(ManyLanguagesAbstract $entity): void
    {
        $childLanguage = $entity->getChildLanguage();
        $this->entityManager->persist($childLanguage);
        $this->entityManager->flush();

        $entity->addChildLanguage($childLanguage);
        $this->entityManager->persist($entity);
        $this->entityManager->flush();
    }

    public function beforeUpdate(ManyLanguagesAbstract $entity): void
    {
        if($entity instanceof Course) {
            $entity->setCurrency($this->getCurrency($entity->getCountry()));
        }

        $entity->setLanguage($this->getLanguage());
        $childLanguage = $entity->getChildLanguage();
        $isNew = is_null($childLanguage->getId());
        $this->entityManager->persist($childLanguage);
        $this->entityManager->flush();

        if($isNew) {
            $entity->addChildLanguage($childLanguage);
            $this->entityManager->persist($entity);
            $this->entityManager->flush();
        }
    }

    private function getLanguage(): Language
    {
        return $this->entityManager->getRepository(Language::class)->findOneBy(['id' => EasyAdminLanguage::getIdLang()]);
    }

    private function getCurrency(Country $country): Currency
    {
        return $country->getCurrency();
    }
}
