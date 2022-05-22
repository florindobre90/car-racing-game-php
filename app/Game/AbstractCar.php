<?php

namespace App\Game;

use App\Game\Contracts\CarInterface;
use App\Game\Contracts\SubscriberInterface;

abstract class AbstractCar implements CarInterface, SubscriberInterface
{
    protected float $fuel = 100;
    protected float $consumption;
    protected int   $power;
    protected float $tyres;
    protected float $experience;

    public function __construct()
    {
        $this->power      = rand($this->minPower, $this->maxPower);
        $this->tyres      = $this->randomFloat($this->minTyres, $this->maxTyres);
        $this->experience = $this->randomFloat($this->minExperience, $this->maxExperience);
        $this->consumption = $this->consumption - ($this->consumption * $this->experience / 100) - ($this->consumption * $this->tyres / 100);
    }

    public function notify(string $event, array $eventData = []): void
    {
         match ($event) {
            "updateFuel" => $this->updateConsumption($eventData['multiplier']),
            "makeLap" => $this->makeLap(),
        };
    }
    /**
     * @return void
     */
    public function makeLap(): void
    {
        $this->consumeFuel();
        echo "\n <br/>Racing car " . "({$this->getName()}). <b>Fuel: ". $this->getFuel()."</b>";
    }

    /**
     * @return string
     */
    abstract public function getName(): string;

    /**
     * @return float
     */
    abstract public function getFuel(): float;

    /**
     * @return void
     */
    abstract protected function consumeFuel(): void;

    /**
     * @param $min
     * @param $max
     * @return float
     */
    private function randomFloat($min, $max): float
    {
        return mt_rand($min * 10, $max * 10) / 10;
    }

    /**
     * @param float $multiplier
     * @return void
     */
    public function updateConsumption(float $multiplier): void
    {
        $this->consumption *= $multiplier;
    }

}
