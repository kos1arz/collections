<?php

namespace App\Entity;

use App\Entity\Country;
use App\Entity\Course;
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

    #[ORM\OneToMany(targetEntity: Country::class, mappedBy: 'currency')]
    private Collection $countries;

    #[ORM\OneToMany(targetEntity: Course::class, mappedBy: 'currency')]
    private Collection $courses;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string  $symbol = null;

    #[ORM\Column(length: 10, unique: true)]
    private string $code;

    #[ORM\Column(options: ['default' => false])]
    private bool $active = false;

    public function __construct()
    {
        $this->courses = new ArrayCollection();
        $this->countries = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->name . ' (' . $this->symbol . ')';
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
            $course->setCurrency($this);
        }

        return $this;
    }

    public function removeCourse(Course $course): self
    {
        if ($this->courses->removeElement($course)) {
            if ($course->getCurrency() === $this) {
                $course->setCurrency(null);
            }
        }

        return $this;
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
