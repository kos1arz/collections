<?php

namespace App\EventListener;

use Symfony\Component\HttpKernel\Event\RequestEvent;

class LocaleListener
{
    public function onKernelRequest(RequestEvent $event)
    {
        $request = $event->getRequest();
        if ($request->hasPreviousSession() && $request->getSession()->has('_locale')) {
            $locale = $request->getSession()->get('_locale');
            $request->setLocale($locale);
        }
    }
}
