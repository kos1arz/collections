<?php

namespace App\Entity;

use DateTime;
use App\Entity\Category;
use App\Entity\Currency;
use App\Entity\Country;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CourseRepository;
use App\Entity\Traits\EntityBaseTrait;
use App\Entity\Traits\TimestampableTrait;
use Doctrine\Common\Collections\Collection;
use App\Entity\Interfaces\EntityBaseInterface;
use Doctrine\Common\Collections\ArrayCollection;
use App\Entity\Interfaces\TimestampableInterface;

#[ORM\Entity(repositoryClass: CourseRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Course implements EntityBaseInterface, TimestampableInterface
{
    use EntityBaseTrait;
    use TimestampableTrait;

    #[ORM\ManyToMany(targetEntity: Category::class, inversedBy: "courses")]
    private Collection $categories;

    #[ORM\ManyToOne(targetEntity: Currency::class, inversedBy: 'courses')]
    private Currency $currency;

    #[ORM\ManyToOne(targetEntity: Country::class, inversedBy: 'courses')]
    private Country $country;

    #[ORM\Column(type: "boolean", nullable: false)]
    private $isPublished = 1;

    #[ORM\Column(type: "decimal", precision: 10, scale: 2, nullable: true)]
    private $price = null;

    #[ORM\Column(type: "decimal", precision: 10, scale: 2, nullable: true)]
    private $promotionalPrice = null;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $shortDescription = null;

    #[ORM\Column(type: "datetime", nullable: true)]
    private ?DateTime $startDate = null;

    #[ORM\Column(type: "json")]
    private $extraDetails = [];

    #[ORM\Column(type: "json")]
    private $trainingPrograms = [];

    #[ORM\Column(type: "json")]
    private $learningOutcomes = [];

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $info;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->addCourse($this);
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->categories->contains($category)) {
            $this->categories->removeElement($category);
            $category->removeCourse($this);
        }

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

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): self
    {
        $this->country = $country;

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

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPromotionalPrice(): ?string
    {
        return $this->promotionalPrice;
    }

    public function setPromotionalPrice(?string $promotionalPrice): self
    {
        $this->promotionalPrice = $promotionalPrice;

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

    public function getStartDate(): ?DateTime
    {
        return $this->startDate  ;
    }

    public function setStartDate(?DateTime $startDate  ): self
    {
        $this->startDate = $startDate  ;

        return $this;
    }

    public function getExtraDetailsInfo(): ?string
    {
        return $this->extraDetails['info'] ?? null;
    }

    public function setExtraDetailsInfo(?string $info): self
    {
        $this->extraDetails['info'] = $info;

        return $this;
    }

    public function getExtraDetailsList(): ?array
    {
        return $this->extraDetails['list'] ?? null;
    }

    public function setExtraDetailsList(array $list): self
    {
        $this->extraDetails['list'] = $list;

        return $this;
    }

    public function getExtraDetails(): ?array
    {
        return $this->extraDetails;
    }

    public function setExtraDetails(array $extraDetails): self
    {
        $this->extraDetails = $extraDetails;

        return $this;
    }

    public function getTrainingPrograms(): ?array
    {
        return $this->trainingPrograms;
    }

    public function setTrainingPrograms(array $trainingPrograms): self
    {
        $this->trainingPrograms = $trainingPrograms;

        return $this;
    }

    public function isTrainingPrograms(): bool
    {
        return (
            $this->isTrainingProgramsTheoretical()
            && $this->isTrainingProgramsPractical()
            && $this->getTrainingProgramsTitle() !== null
        );
    }

    public function getTrainingProgramsTitle(): ?string
    {
        return $this->trainingPrograms['title'] ?? null;
    }

    public function setTrainingProgramsTitle(?string $title): self
    {
        $this->trainingPrograms['title'] = $title;

        return $this;
    }

    public function getTrainingProgramsTheoretical(): ?array
    {
        return $this->trainingPrograms['theoretical'];
    }

    public function isTrainingProgramsTheoretical(): bool
    {
        $theoretical = $this->trainingPrograms['theoretical'] ?? [];

        return (
            ($theoretical['description'] ?? null) !== null
            && count($theoretical['list'] ?? []) > 0
            && ($theoretical['info'] ?? null) !== null
        );
    }

    public function getTrainingProgramsTheoreticalDescription(): ?string
    {
        return $this->trainingPrograms['theoretical']['description'] ?? null;
    }

    public function setTrainingProgramsTheoreticalDescription(?string $description): self
    {
        $this->trainingPrograms['theoretical']['description'] = $description;

        return $this;
    }

    public function getTrainingProgramsTheoreticalList(): ?array
    {
        return $this->trainingPrograms['theoretical']['list'] ?? null;
    }

    public function setTrainingProgramsTheoreticalList(array $list): self
    {
        $this->trainingPrograms['theoretical']['list'] = $list;

        return $this;
    }

    public function getTrainingProgramsTheoreticalInfo(): ?string
    {
        return $this->trainingPrograms['theoretical']['info'] ?? null;
    }

    public function setTrainingProgramsTheoreticalInfo(?string $info): self
    {
        $this->trainingPrograms['theoretical']['info'] = $info;

        return $this;
    }

    public function getTrainingProgramsPractical(): ?array
    {
        return $this->trainingPrograms['practical'];
    }

    public function isTrainingProgramsPractical(): bool
    {
        $theoretical = $this->trainingPrograms['practical'] ?? [];
        return (
            ($theoretical['description'] ?? null) !== null
            && count($theoretical['list'] ?? []) > 0
            && ($theoretical['info'] ?? null) !== null
        );
    }

    public function getTrainingProgramsPracticalDescription(): ?string
    {
        return $this->trainingPrograms['practical']['description'] ?? null;
    }

    public function setTrainingProgramsPracticalDescription(?string $description): self
    {
        $this->trainingPrograms['practical']['description'] = $description;

        return $this;
    }

    public function getTrainingProgramsPracticalList(): ?array
    {
        return $this->trainingPrograms['practical']['list'] ?? null;
    }

    public function setTrainingProgramsPracticalList(array $list): self
    {
        $this->trainingPrograms['practical']['list'] = $list;

        return $this;
    }

    public function getTrainingProgramsPracticalInfo(): ?string
    {
        return $this->trainingPrograms['practical']['info'] ?? null;
    }

    public function setTrainingProgramsPracticalInfo(?string $info): self
    {
        $this->trainingPrograms['practical']['info'] = $info;

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

    public function isLearningOutcomes(): bool
    {
         return (
            $this->isLearningOutcomesFirstBox()
            || $this->isLearningOutcomesSecondBox()
            || $this->getLearningOutcomesInfo() !== null
        );
    }

    public function getLearningOutcomes(): ?array
    {
        return $this->learningOutcomes;
    }

    public function getLearningOutcomesFirstBox(): ?array
    {
        return $this->learningOutcomes['firstBox'];
    }

    public function isLearningOutcomesFirstBox(): bool
    {
        $firstBox = $this->learningOutcomes['firstBox'] ?? [];

        return (
            ($firstBox['description'] ?? null) !== null
            && count($firstBox['list'] ?? []) > 0
            && ($firstBox['title'] ?? null) !== null
        );
    }

    public function getLearningOutcomesFirstBoxTitle(): ?string
    {
        return $this->learningOutcomes['firstBox']['title'] ?? null;
    }

    public function setLearningOutcomesFirstBoxTitle(?string $description): self
    {
        $this->learningOutcomes['firstBox']['title'] = $description;

        return $this;
    }

    public function getLearningOutcomesFirstBoxDescription(): ?string
    {
        return $this->learningOutcomes['firstBox']['description'] ?? null;
    }

    public function setLearningOutcomesFirstBoxDescription(?string $description): self
    {
        $this->learningOutcomes['firstBox']['description'] = $description;

        return $this;
    }

    public function getLearningOutcomesFirstBoxList(): ?array
    {
        return $this->learningOutcomes['firstBox']['list'] ?? null;
    }

    public function setLearningOutcomesFirstBoxList(array $list): self
    {
        $this->learningOutcomes['firstBox']['list'] = $list;

        return $this;
    }

    public function getLearningOutcomesSecondBox(): ?array
    {
        return $this->learningOutcomes['secondBox'];
    }

    public function isLearningOutcomesSecondBox(): bool
    {
        $secondBox = $this->learningOutcomes['secondBox'] ?? [];

        return (
            ($secondBox['description'] ?? null) !== null
            && ($secondBox['title'] ?? null) !== null
        );
    }

    public function getLearningOutcomesSecondBoxTitle(): ?string
    {
        return $this->learningOutcomes['secondBox']['title'] ?? null;
    }

    public function setLearningOutcomesSecondBoxTitle(?string $description): self
    {
        $this->learningOutcomes['secondBox']['title'] = $description;

        return $this;
    }

    public function getLearningOutcomesSecondBoxDescription(): ?string
    {
        return $this->learningOutcomes['secondBox']['description'] ?? null;
    }

    public function setLearningOutcomesSecondBoxDescription(?string $description): self
    {
        $this->learningOutcomes['secondBox']['description'] = $description;

        return $this;
    }

    public function getLearningOutcomesInfo(): ?string
    {
        return $this->learningOutcomes['info'] ?? null;
    }

    public function setLearningOutcomesInfo(?string $info): self
    {
        $this->learningOutcomes['info'] = $info;

        return $this;
    }
}
