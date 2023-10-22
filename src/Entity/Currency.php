<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\TimestampableTrait;
use App\Entity\Traits\EntityBaseTrait;
use App\Entity\Interfaces\TimestampableInterface;
use App\Entity\Interfaces\EntityBaseInterface;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Repository\CurrencyRepository;

#[ORM\Entity(repositoryClass: CurrencyRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Currency implements EntityBaseInterface, TimestampableInterface
{
    use TimestampableTrait;
    use EntityBaseTrait;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string  $symbol = null;

    #[ORM\Column(length: 10, unique: true)]
    private string $code;

    #[ORM\OneToMany(targetEntity: Country::class, mappedBy: 'currency')]
    private Collection $countries;

    public function __construct()
    {
        $this->countries = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->name;
    }

    /**
     * @return Collection<int, Country>
     */
    public function getCountries(): Collection
    {
        return $this->countries;
    }

    public function getSymbol(): ?string
    {
        return $this->symbol;
    }

    public function setSymbol(?string $symbol): self
    {
        $this->symbol = $symbol;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;
        return $this;
    }
}
