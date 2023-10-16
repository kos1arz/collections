<?php

namespace App\Entity\Interfaces;

interface TranslationInterface
{
    public function getLocale(): string;
    public function setLocale(string $locale): self;
}
