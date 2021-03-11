<?php

class RaceApp
{
    private RaceTrack $race;
    private Layout $layout;

    public function __construct(RaceTrack $race)
    {
        $this->race = $race;
    }


    public function setLayout(Layout $layout): void
    {
        $this->layout = $layout;
    }

    public function run()
    {
        $timer = 0;
        $participants = $this->race->getParticipants();
        while (true) {

            $timer++;
            $this->race->finishReached($timer);
            $this->layout->setLayout();
            $this->race->makeTracks();
            $this->race->placeParticipants($participants);
            print("\033[H\033[J");
            echo 'TIMER: ' . $timer . ' sec' . PHP_EOL;
            $this->printTrack();
            sleep(1);
            $this->moveAll($participants);

            if ($this->raceEnded($participants) === count($participants->getMovableItems())) {
                $this->printResults();
                exit;
            }
        }
    }


    private function printTrack(): void
    {
        foreach ($this->race->getTrack() as $road) {
            echo PHP_EOL . implode('', $road) . PHP_EOL;
        }
    }

    private function moveAll(MovableCollection $participants): void
    {
        foreach ($participants->getMovableItems() as $participant) {
            $participant->move();
            $participant->crush();
        }
    }

    private function raceEnded(MovableCollection $participants): int
    {
        $ended = 0;
        foreach ($participants->getMovableItems() as $participant) {
            if ($participant->raceFinished()) {
                $ended++;
            }
        }
        return $ended;
    }

    private function printResults(): void
    {
        $place = 1;
        foreach ($this->race->getResults() as $key => $value) {
            echo '[' . $place++ . '.place] ' . $key .
                ': result - ' . $value . ' sec' . PHP_EOL;
        }

    }

}

