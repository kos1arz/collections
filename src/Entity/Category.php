<?php

namespace App\Entity;

use App\Entity\Course;
use App\Entity\CategoryLanguage;
use App\Repository\CategoryRepository;
use App\Entity\Traits\TimestampableTrait;
use App\Entity\Traits\IdTrait;
use App\Entity\Interfaces\TimestampableInterface;
use App\Entity\Interfaces\IdInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Abstract\ManyLanguagesAbstract;
use App\Service\Admin\EasyAdminLanguage;
#[ORM\Entity(repositoryClass: CategoryRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Category extends ManyLanguagesAbstract implements IdInterface, TimestampableInterface
{
    use TimestampableTrait;
    use IdTrait;

    #[ORM\ManyToMany(targetEntity: Course::class, mappedBy: "categories")]
    private $courses;

    #[ORM\OneToMany(targetEntity: CategoryLanguage::class, mappedBy: 'category')]
    private Collection $categoryLanguage;

    public function __construct()
    {
        $this->creatChildLanguage();
        $this->categoryLanguage = new ArrayCollection();
        $this->courses = new ArrayCollection();
    }

    public CategoryLanguage $childLanguage;

    public function __toString(): string
    {
        $categoryLanguages = $this->getCategoryLanguage();
        $name = '';
        foreach($categoryLanguages as $language) {
            $name = $language->getName();
            if($language->getLanguage()->getId() === EasyAdminLanguage::getIdLang()) {
                return  $name;
            }
        }

        return  $name;
    }

    // ==================================

    public function creatChildLanguage(): void
    {
        $this->childLanguage = new CategoryLanguage();
    }

    public function setChildLanguage(object $childLanguage): void
    {
        $this->childLanguage = $childLanguage;
    }

    public function addChildLanguage(): void
    {
        $this->addCategoryLanguage($this->childLanguage);
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
     * @return Collection|Course[]
     */
    public function getCategories(): Collection
    {
        return $this->courses;
    }

    public function addCourse(Course $course): self
    {
        if (!$this->courses->contains($course)) {
            $this->courses[] = $course;
            $course->addCategory($this);
        }

        return $this;
    }

    public function removeCourse(Course $course): self
    {
        if ($this->courses->contains($course)) {
            $this->courses->removeElement($course);
            $course->removeCategory($this);
        }

        return $this;
    }


    /**
     * @return Collection|CategoryLanguage[]
     */
    public function getCategoryLanguage(): Collection
    {
        return $this->categoryLanguage;
    }

    public function addCategoryLanguage(CategoryLanguage $categoryLanguage): self
    {
        if (!$this->categoryLanguage->contains($categoryLanguage)) {
            $this->categoryLanguage[] = $categoryLanguage;
            $categoryLanguage->setCategory($this);
        }

        return $this;
    }

    public function removeCategoryLanguages(CategoryLanguage $categoryLanguage): self
    {
        if ($this->categoryLanguage->removeElement($categoryLanguage)) {
            if ($categoryLanguage->getCategory() === $this) {
                $categoryLanguage->setCategory(null);
            }
        }

        return $this;
    }
}
