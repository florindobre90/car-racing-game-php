<?php

namespace App\Game;

use Illuminate\Support\Arr;

class Track
{
    const OFF_ROAD_MULTIPLIER = 2;
    const STREET_MULTIPLIER = 1.4;

    private string $trackType;

    public function __construct()
    {
        $this->trackType = Arr::random(["street", "offroad"]);
    }

    /**
     * @return bool
     */
    public function isOffRoad(): bool
    {
        return $this->trackType == "offroad";
    }

    /**
     * @return float
     */
    public function getFuelMultiplier(): float
    {
        return $this->isOffRoad() ? self::OFF_ROAD_MULTIPLIER : self::STREET_MULTIPLIER;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "Track type: ".$this->trackType;
    }

}
