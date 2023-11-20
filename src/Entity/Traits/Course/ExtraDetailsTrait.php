<?php

namespace App\Entity\Traits\Course;

use Doctrine\ORM\Mapping as ORM;

trait ExtraDetailsTrait
{
    #[ORM\Column(type: "json", nullable: true)]
    private $extraDetails = [];

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
}
