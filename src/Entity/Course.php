<?php

namespace App\Entity;

use DateTime;
use App\Entity\Category;
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

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $content = null;

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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

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
}
