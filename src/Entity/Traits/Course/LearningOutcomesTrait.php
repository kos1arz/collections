<?php

namespace App\Entity\Traits\Course;

use Doctrine\ORM\Mapping as ORM;

trait LearningOutcomesTrait
{
    #[ORM\Column(type: "json", nullable: true)]
    private $learningOutcomes = [];

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
