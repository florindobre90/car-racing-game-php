<?php

namespace App\Game\Cars\Traits;

trait PropsTrait
{
    protected function consumeFuel(): void
    {
        $this->fuel -= $this->consumption;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getTyres(): float
    {
        return $this->tyres;
    }

    public function getPower(): int
    {
        return $this->power;
    }

    public function getOffroad(): int
    {
        return $this->offRoad;
    }

    public function getExperience(): float
    {
        return $this->experience;
    }

    public function getConsumption(): float
    {
        return $this->consumption;
    }

    public function getFuel(): float
    {
        return $this->fuel;
    }
}
