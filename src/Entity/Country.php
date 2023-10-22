<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\TimestampableTrait;
use App\Entity\Traits\EntityBaseTrait;
use App\Entity\Interfaces\TimestampableInterface;
use App\Entity\Interfaces\EntityBaseInterface;
use App\Repository\CountryRepository;

#[ORM\Entity(repositoryClass: CountryRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Country implements EntityBaseInterface, TimestampableInterface
{
    use TimestampableTrait;
    use EntityBaseTrait;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string  $flag = null;

    #[ORM\Column(length: 2, nullable: true)]
    private ?string $cca2 = null;

    #[ORM\Column(length: 3, nullable: true)]
    private ?string $cca3 = null;

    #[ORM\Column(options: ['default' => false])]
    private bool $active = false;

    #[ORM\ManyToOne(targetEntity: Currency::class, inversedBy: 'countries')]
    private Currency $currency;

    public function getFlag(): ?string
    {
        return $this->flag;
    }

    public function setFlag(?string $flag): self
    {
        $this->flag = $flag;

        return $this;
    }

    public function getCca2(): ?string
    {
        return $this->cca2;
    }

    public function setCca2(?string $cca2): self
    {
        $this->cca2 = $cca2;

        return $this;
    }

    public function getCca3(): ?string
    {
        return $this->cca3;
    }

    public function setCca3(?string $cca3): self
    {
        $this->cca3 = $cca3;

        return $this;
    }

    public function getCurrency(): ?Currency
    {
        return $this->currency;
    }

    public function setCurrency(?Currency $currency): self
    {
        $this->currency = $currency;

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
