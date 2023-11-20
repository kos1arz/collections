<?php

namespace App\Entity\Traits\Course;

use Doctrine\ORM\Mapping as ORM;

trait TrainingProgramsTrait
{
    #[ORM\Column(type: "json", nullable: true)]
    private $trainingPrograms = [];

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
}
