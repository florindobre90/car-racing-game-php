<?php

namespace App\Game\Cars;

use App\Game\AbstractCar;
use App\Game\Cars\Traits\PropsTrait;

class Sarge extends AbstractCar
{
    use PropsTrait;

    protected string $name = 'Sarge';

    protected float $consumption = 10;
    protected int $offRoad = 1;

    protected int $minPower = 130;
    protected int $maxPower = 200;

    protected float $minTyres = 6;
    protected float $maxTyres = 7.5;

    protected float $minExperience = 7.5;
    protected float $maxExperience = 8.5;

}
