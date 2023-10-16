<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\TimestampableTrait;
use App\Entity\Traits\EntityBaseTrait;
use App\Entity\Interfaces\TimestampableInterface;
use App\Entity\Interfaces\EntityBaseInterface;

#[ORM\Entity(repositoryClass: TagRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Tag implements EntityBaseInterface, TimestampableInterface {
    use TimestampableTrait;
    use EntityBaseTrait;

    #[ORM\Column(length: 7, nullable: false)]
    private $textColor;

    #[ORM\Column(length: 7, nullable: false)]
    private $backgroundColor;

    public function getTextColor(): ?string
    {
        return $this->textColor;
    }

    public function setTextColor(string $textColor = '#FFFFFF'): self
    {
        $this->textColor = $textColor;

        return $this;
    }

    public function getBackgroundColor(): ?string
    {
        return $this->backgroundColor;
    }

    public function setBackgroundColor(string $backgroundColor = '#d32b2b'): self
    {
        $this->backgroundColor = $backgroundColor;

        return $this;
    }
}
