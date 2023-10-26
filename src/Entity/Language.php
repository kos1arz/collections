<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\EntityBaseTrait;
use App\Repository\LanguageRepository;
use App\Entity\Traits\TimestampableTrait;
use App\Entity\Interfaces\EntityBaseInterface;
use App\Entity\Interfaces\TimestampableInterface;

#[ORM\Entity(repositoryClass: LanguageRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Language implements EntityBaseInterface, TimestampableInterface
{
    use TimestampableTrait;
    use EntityBaseTrait;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string  $flag = null;

    #[ORM\Column(length: 10, nullable: false)]
    private string $code;

    #[ORM\Column(options: ['default' => false])]
    private bool $active = false;

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getFlag(): ?string
    {
        return $this->flag;
    }

    public function setFlag(?string $flag): self
    {
        $this->flag = $flag;

        return $this;
    }

    public function getActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }
}
