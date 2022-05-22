<?php

namespace App\Game\Builder;

use App\Game\Factory\CarFactory;
use App\Game\Contracts\CarInterface;
use Exception;

class CarBuilder
{
    private string $type;

    const MCQUEEN = CarFactory::MCQUEEN;
    const HUDSON  = CarFactory::HUDSON;
    const SNOTROD = CarFactory::SNOTROD;
    const SARGE   = CarFactory::SARGE;
    const SALLY   = CarFactory::SALLY;

    /**
     * @param string $type
     * @return void
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @throws Exception
     */
    public function build(): CarInterface
    {
        return match ($this->type) {
            self::MCQUEEN, self::HUDSON, self::SNOTROD, self::SARGE, self::SALLY => CarFactory::factory($this->type),
            default => throw new Exception("Undefined car type"),
        };
    }
}
