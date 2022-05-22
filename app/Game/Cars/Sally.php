<?php

namespace App\Game\Cars;

use App\Game\AbstractCar;
use App\Game\Cars\Traits\PropsTrait;

class Sally extends AbstractCar
{
    use PropsTrait;

    protected string $name = 'Sally Carrera';

    protected float $consumption = 8;
    protected int $offRoad = 0;

    protected int $minPower = 115;
    protected int $maxPower = 150;

    protected float $minTyres = 6.5;
    protected float $maxTyres = 8.5;

    protected float $minExperience = 1;
    protected float $maxExperience = 1.25;

}
