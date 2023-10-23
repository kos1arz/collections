<?php

namespace App\Entity;

use App\Entity\Course;
use App\Entity\Currency;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use App\Entity\Traits\TimestampableTrait;
use App\Entity\Traits\EntityBaseTrait;
use Doctrine\Common\Collections\ArrayCollection;
use App\Entity\Interfaces\TimestampableInterface;
use App\Entity\Interfaces\EntityBaseInterface;
use App\Repository\CountryRepository;

#[ORM\Entity(repositoryClass: CountryRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Country implements EntityBaseInterface, TimestampableInterface
{
    use TimestampableTrait;
    use EntityBaseTrait;

    #[ORM\ManyToOne(targetEntity: Currency::class, inversedBy: 'countries')]
    private Currency $currency;

    #[ORM\OneToMany(targetEntity: Course::class, mappedBy: 'country')]
    private Collection $courses;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string  $flag = null;

    #[ORM\Column(length: 2, nullable: true)]
    private ?string $cca2 = null;

    #[ORM\Column(length: 3, nullable: true)]
    private ?string $cca3 = null;

    #[ORM\Column(options: ['default' => false])]
    private bool $active = false;

    public function __construct()
    {
        $this->courses = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->name;
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

    /**
     * @return Collection|Course[]
     */
    public function getCourses(): Collection
    {
        return $this->courses;
    }

    public function addCourse(Course $course): self
    {
        if (!$this->courses->contains($course)) {
            $this->courses[] = $course;
            $course->setCountry($this);
        }

        return $this;
    }

    public function removeCourse(Course $course): self
    {
        if ($this->courses->removeElement($course)) {
            if ($course->getCountry() === $this) {
                $course->setCountry(null);
            }
        }

        return $this;
    }
}
