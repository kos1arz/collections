<?php

namespace App\Entity;

use App\Entity\CourseLanguage;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\EntityBaseTrait;
use App\Repository\LanguageRepository;
use App\Entity\Traits\TimestampableTrait;
use Doctrine\Common\Collections\Collection;
use App\Entity\Interfaces\EntityBaseInterface;
use Doctrine\Common\Collections\ArrayCollection;
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

    #[ORM\OneToMany(targetEntity: CourseLanguage::class, mappedBy: 'language')]
    private Collection $courseLanguages;

    public function __construct()
    {
        $this->courseLanguages = new ArrayCollection();
    }

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

        /**
     * @return Collection|CourseLanguage[]
     */
    public function getCourseLanguages(): Collection
    {
        return $this->courseLanguages;
    }

    public function addCourseLanguages(CourseLanguage $courseLanguage): self
    {
        if (!$this->courseLanguages->contains($courseLanguage)) {
            $this->courseLanguages[] = $courseLanguage;
            $courseLanguage->setLanguage($this);
        }

        return $this;
    }

    public function removeCourseLanguages(CourseLanguage $courseLanguage): self
    {
        if ($this->courseLanguages->removeElement($courseLanguage)) {
            if ($courseLanguage->getLanguage() === $this) {
                $courseLanguage->setLanguage(null);
            }
        }

        return $this;
    }
}
