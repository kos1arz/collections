<?php

namespace App\Entity\Traits;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Doctrine\ORM\Mapping as ORM;

trait TranslationTrait
{
    #[ORM\Column(type: "string", length: 5, nullable: false)]
    #[NotBlank]
    #[NotNull]
    private $locale;

    public function getLocale(): string
    {
        return $this->name;
    }

    public function setLocale(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
