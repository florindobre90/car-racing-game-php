<?php

namespace App\Game\Cars;

use App\Game\AbstractCar;
use App\Game\Cars\Traits\PropsTrait;

class Snotrod extends AbstractCar
{
    use PropsTrait;

    protected string $name = 'Snotrod';

    protected float $consumption = 9;
    protected int $offRoad = 0;

    protected int $minPower = 190;
    protected int $maxPower = 250;

    protected float $minTyres = 6.5;
    protected float $maxTyres = 8.5;

    protected float $minExperience = 4.5;
    protected float $maxExperience = 7;

}
