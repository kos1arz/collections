<?php

namespace App\Entity\Traits;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Doctrine\ORM\Mapping as ORM;

trait NameTrait
{
    #[ORM\Column(length: 255, nullable: false)]
    #[NotBlank]
    #[NotNull]
    private string $name;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
