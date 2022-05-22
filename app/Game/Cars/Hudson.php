<?php

namespace App\Game\Cars;

use App\Game\AbstractCar;
use App\Game\Cars\Traits\PropsTrait;

class Hudson extends AbstractCar
{
    use PropsTrait;

    protected string $name = 'Doc Hudson';

    protected float $consumption = 7;
    protected int $offRoad = 0;

    protected int $minPower = 90;
    protected int $maxPower = 12;

    protected float $minTyres = 4;
    protected float $maxTyres = 6;

    protected float $minExperience = 8;
    protected float $maxExperience = 9;
}
