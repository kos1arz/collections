<?php

declare(strict_types=1);

namespace App\EventSubscriber;

use App\Entity\Abstract\ManyLanguagesAbstract;
use App\Service\Admin\EasyAdminSubscriberService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityBuiltEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;

class EasyAdminSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private EasyAdminSubscriberService $service,
    ) {}

    public static function getSubscribedEvents()
    {
        return [
            AfterEntityBuiltEvent::class => ['afterBuilt'],
            BeforeEntityPersistedEvent::class => ['beforeCreate'],
            AfterEntityPersistedEvent::class => ['afterCreate'],
            BeforeEntityUpdatedEvent::class => ['beforeUpdate'],
        ];
    }

    public function afterBuilt(AfterEntityBuiltEvent $event)
    {
        $entity = $event->getEntity()->getInstance();

        if($entity instanceof ManyLanguagesAbstract) {
            $this->service->afterBuilt($entity);
        }
    }

    public function beforeCreate(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if($entity instanceof ManyLanguagesAbstract) {
            $this->service->beforeCreate($entity);
        }
    }

    public function afterCreate(AfterEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if($entity instanceof ManyLanguagesAbstract) {
            $this->service->afterCreate($entity);
        }
    }

    public function beforeUpdate(BeforeEntityUpdatedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if($entity instanceof ManyLanguagesAbstract) {
            $this->service->beforeUpdate($entity);
        }
    }
}
