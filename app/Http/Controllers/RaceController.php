<?php

namespace App\Http\Controllers;

use App\Game\Builder\CarBuilder;
use App\Game\Race;
use App\Game\Factory\CarFactory;
use Exception;
use Illuminate\Http\Request;

class RaceController extends Controller
{
    /**
     * @param CarBuilder $carBuilder
     * @param Race $race
     */
    public function __construct(protected CarBuilder $carBuilder, protected Race $race)
    {
        //
    }

    /**
     * @param CarBuilder $carBuilder
     * @param Race $race
     * @return void
     * @throws Exception
     */
    public function __invoke(CarBuilder $carBuilder, Race $race): void
    {
        // Building cars
        $this->carBuilder->setType(CarFactory::MCQUEEN);
        $this->race->addCar($this->carBuilder->build());

        $this->carBuilder
            ->setType(
                collect(
                    [
                        CarFactory::HUDSON,
                        CarFactory::SNOTROD,
                        CarFactory::SARGE,
                        CarFactory::SALLY
                    ])->random()
            );
        $this->race->addCar($this->carBuilder->build());

        $this->race->start();
    }
}
