<?php

namespace App\Entity;

use App\Entity\Course;
use App\Entity\Language;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\EntityBaseTrait;
use App\Entity\Traits\TimestampableTrait;
use App\Repository\CourseLanguageRepository;
use App\Entity\Interfaces\EntityBaseInterface;
use App\Entity\Interfaces\TimestampableInterface;
use App\Entity\Traits\Course\LearningOutcomesTrait;
use App\Entity\Traits\Course\TrainingProgramsTrait;
use App\Entity\Traits\Course\ExtraDetailsTrait;

#[ORM\Entity(repositoryClass: CourseLanguageRepository::class)]
#[ORM\HasLifecycleCallbacks]
class CourseLanguage implements EntityBaseInterface, TimestampableInterface
{
    use EntityBaseTrait;
    use TimestampableTrait;
    use LearningOutcomesTrait;
    use TrainingProgramsTrait;
    use ExtraDetailsTrait;

    #[ORM\ManyToOne(targetEntity: Course::class, inversedBy: 'courseLanguages')]
    private ?Course $course = null;

    #[ORM\ManyToOne(targetEntity: Language::class, inversedBy: 'courseLanguages')]
    private Language $language;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $shortDescription = null;

    #[ORM\Column(type: "boolean", nullable: false)]
    private $isPublished = 1;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $info;

    public function getCourse(): ?Course
    {
        return $this->course;
    }

    public function setCourse(?Course $course): self
    {
        $this->course = $course;

        return $this;
    }

    public function getLanguage(): ?Language
    {
        return $this->language;
    }

    public function setLanguage(?Language $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->shortDescription ;
    }

    public function setShortDescription(?string $shortDescription ): self
    {
        $this->shortDescription = $shortDescription ;

        return $this;
    }

    public function getIsPublished(): bool
    {
        return $this->isPublished;
    }

    public function setIsPublished(bool $isPublished): self
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    public function getInfo(): ?string
    {
        return $this->info;
    }

    public function setInfo(?string $info): self
    {
        $this->info = $info;

        return $this;
    }
}
