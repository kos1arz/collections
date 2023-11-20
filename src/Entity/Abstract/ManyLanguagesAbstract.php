<?php

declare(strict_types=1);

namespace App\Entity\Abstract;

use App\Entity\Language;

abstract class ManyLanguagesAbstract {

    abstract public function creatChildLanguage(): void;

    abstract public function setChildLanguage(object $childLanguage): void;

    abstract public function addChildLanguage(): void;

    abstract public function setLanguage(Language $language): void;

    abstract public function getChildLanguage(): object;
}
