<?php

namespace App\Game\Cars;

use App\Game\AbstractCar;
use App\Game\Cars\Traits\PropsTrait;

class McQueen extends AbstractCar
{
    use PropsTrait;

    protected string $name = 'Lightning McQueen';

    protected float $consumption = 5;
    protected int $offRoad = 0;

    protected int $minPower = 110;
    protected int $maxPower = 190;

    protected float $minTyres = 5;
    protected float $maxTyres = 7;

    protected float $minExperience = 8;
    protected float $maxExperience = 9;

}
