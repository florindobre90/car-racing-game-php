<?php

namespace App\Game\Contracts;

interface CarInterface
{
    public function makeLap(): void;

    public function updateConsumption(float $multiplier): void;
}
