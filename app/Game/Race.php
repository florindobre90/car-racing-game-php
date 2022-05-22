<?php

namespace App\Game;

use App\Game\Contracts\CarInterface;

class Race
{
    protected array $racers = [];
    private int $laps = 1;
    private bool $raceFinished = false;
    private bool $updateOthersFuel = false;

    /**
     * @param Track $track
     */
    public function __construct(private Track $track)
    {
        //
    }

    public function start(): void
    {
        $this->prepareCarsFuel();

        echo "Race has been started...<br/><br/>";
        $this->displayInfoAboutRace();
        echo '<br/><br/>';

        while ($this->raceFinished == false) {
            $this->makeLap();
            echo '<br/>';
        }

        echo '<br/><br/><b>Winner is '.$this->getWinners().'<b/>';
    }

    private function displayInfoAboutRace(): void
    {
        echo $this->track;
        echo "<br/>Number of vehicles: ".count($this->racers)."<br/><br/>";

        foreach($this->racers as $racer) {
            echo $racer->getName()
                .' | HP: '.$racer->getPower()
                .' | Offroad: '.$racer->getOffroad()
                .' | Experience: '.$racer->getExperience()
                .' | Tyres: '.$racer->getTyres()
                .' | Updated consumption: '.$racer->getConsumption().'<br/>';
        }
    }

    private function makeLap(): void
    {
        $this->displayLapInfo($this->laps);

        foreach ($this->racers as $racer) {
            $racer->notify('makeLap');

            if($racer->getFuel() < 0) {
                $this->raceFinished = true;
            }
        }
        $this->laps++;
    }

    private function displayLapInfo(int $lap): void
    {
        echo "<br/>Lap {$lap} started:";
    }

    private function getWinners(): string
    {
        $fuels = [];
        foreach ($this->racers as $racer) {
            $fuels[$racer->getName()] = $racer->getFuel();
        }

        return array_search(max($fuels), $fuels);
    }

    /**
     * @param CarInterface $car
     * @return void
     */
    public function addCar(CarInterface $car): void
    {
        if($car->getOffroad() && $this->track->isOffRoad()) {
            $this->updateOthersFuel = true;
        }
        $this->racers[] = $car;
    }

    public function prepareCarsFuel(): void
    {
        foreach($this->racers as $racer) {
            if(($racer->getPower() > 140 && !$this->track->isOffRoad()) || ($this->updateOthersFuel && !$racer->getOffroad())) {
                $racer->notify('updateFuel', ['multiplier' => $this->track->getFuelMultiplier()]);
            }
        }
    }
}
