<?php

namespace App\Entity;

use DateTime;
use App\Entity\Category;
use App\Entity\Currency;
use App\Entity\Country;
use App\Entity\Language;
use App\Entity\CourseLanguage;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CourseRepository;
use App\Entity\Traits\IdTrait;
use App\Entity\Traits\TimestampableTrait;
use Doctrine\Common\Collections\Collection;
use App\Entity\Interfaces\IdInterface;
use App\Entity\Abstract\ManyLanguagesAbstract;
use Doctrine\Common\Collections\ArrayCollection;
use App\Entity\Interfaces\TimestampableInterface;
use Doctrine\ORM\EntityManagerInterface;

#[ORM\Entity(repositoryClass: CourseRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Course extends ManyLanguagesAbstract implements IdInterface, TimestampableInterface
{
    use IdTrait;
    use TimestampableTrait;

    #[ORM\ManyToMany(targetEntity: Category::class, inversedBy: "courses")]
    private Collection $categories;

    #[ORM\ManyToOne(targetEntity: Currency::class, inversedBy: 'courses')]
    private Currency $currency;

    #[ORM\ManyToOne(targetEntity: Country::class, inversedBy: 'courses')]
    private Country $country;

    #[ORM\OneToMany(targetEntity: CourseLanguage::class, mappedBy: 'course')]
    private Collection $courseLanguages;

    #[ORM\Column(type: "decimal", precision: 10, scale: 2, nullable: true)]
    private $price = null;

    #[ORM\Column(type: "decimal", precision: 10, scale: 2, nullable: true)]
    private $promotionalPrice = null;

    #[ORM\Column(type: "datetime", nullable: true)]
    private ?DateTime $startDate = null;

    public CourseLanguage $childLanguage;

    public function __construct()
    {
        $this->creatChildLanguage();
        $this->courseLanguages = new ArrayCollection();
        $this->categories = new ArrayCollection();
    }


    // ==================================

    public function creatChildLanguage(): void
    {
        $this->childLanguage = new CourseLanguage();
    }

    public function setChildLanguage(object $childLanguage): void
    {
        $this->childLanguage = $childLanguage;
    }

    public function addChildLanguage(): void
    {
        $this->addCourseLanguages($this->childLanguage);
    }

    public function getChildLanguage(): object
    {
        return $this->childLanguage;
    }

    public function setLanguage(Language $language): void
    {
        $this->childLanguage->setLanguage($language);
    }

    // ==================================

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

    public function getStartDate(): ?DateTime
    {
        return $this->startDate  ;
    }

    public function setStartDate(?DateTime $startDate  ): self
    {
        $this->startDate = $startDate  ;

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
            $courseLanguage->setCourse($this);
        }

        return $this;
    }

    public function removeCourseLanguages(CourseLanguage $courseLanguage): self
    {
        if ($this->courseLanguages->removeElement($courseLanguage)) {
            if ($courseLanguage->getCourse() === $this) {
                $courseLanguage->setCourse(null);
            }
        }

        return $this;
    }
}
