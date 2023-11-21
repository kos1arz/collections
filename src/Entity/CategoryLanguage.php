<?php

namespace App\Entity;

use App\Entity\Category;
use App\Entity\Language;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\EntityBaseTrait;
use App\Entity\Traits\TimestampableTrait;
use App\Repository\CategoryLanguageRepository;
use App\Entity\Interfaces\EntityBaseInterface;
use App\Entity\Interfaces\TimestampableInterface;

#[ORM\Entity(repositoryClass: CategoryLanguageRepository::class)]
#[ORM\HasLifecycleCallbacks]
class CategoryLanguage implements EntityBaseInterface, TimestampableInterface
{
    use EntityBaseTrait;
    use TimestampableTrait;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $slug = null;

    #[ORM\ManyToOne(targetEntity: Category::class, inversedBy: 'categoryLanguages')]
    private ?Category $category = null;

    #[ORM\ManyToOne(targetEntity: Language::class, inversedBy: 'courseLanguages')]
    private Language $language;

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

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
}
