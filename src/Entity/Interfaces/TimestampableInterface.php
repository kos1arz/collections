<?php

namespace App\Entity\Interfaces;

use DateTime;

interface TimestampableInterface
{
    public function getCreatedAt(): ?DateTime;
    public function setCreatedAt(DateTime $createdAt): self;

    public function getUpdatedAt(): ?DateTime;
    public function setUpdatedAt(DateTime $updatedAt): self;

    public function updatedTimestamps(): void;
}
