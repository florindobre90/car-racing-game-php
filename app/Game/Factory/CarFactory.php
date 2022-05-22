<?php

namespace App\Game\Factory;

use App\Game\Cars\Sally;
use App\Game\Cars\Sarge;
use App\Game\Cars\McQueen;
use App\Game\Cars\Hudson;
use App\Game\Cars\Snotrod;
use App\Game\Contracts\CarInterface;
use Exception;

class CarFactory
{
    const MCQUEEN = "MCQUEEN";
    const HUDSON  = "HUDSON";
    const SNOTROD = "SNOTROD";
    const SARGE   = "SARGE";
    const SALLY   = "SALLY";

    /**
     * @param string $type
     * @return CarInterface
     * @throws Exception
     */
    public static function factory(string $type): CarInterface
    {
        return match ($type) {
            self::MCQUEEN => new McQueen(),
            self::HUDSON  => new Hudson(),
            self::SNOTROD => new Snotrod(),
            self::SARGE   => new Sarge(),
            self::SALLY   => new Sally(),
            default       => throw new Exception("Undefined car type"),
        };
    }
}
