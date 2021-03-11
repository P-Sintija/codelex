<?php

class RaceApp
{
    private RaceTrack $race;
    private Movable $opel;
    private Movable $ww;
    private Movable $volvo;
    private Movable $bike;
    private Movable $bikeDrunk;
    private MovableCollection $participants;

    public function __construct(RaceTrack $race,
                                Movable $opel,
                                Movable $ww,
                                Movable $volvo,
                                Movable $bike,
                                Movable $bikeDrunk,
                                MovableCollection $participants
    )
    {
        $this->race = $race;
        $this->opel = $opel;
        $this->ww = $ww;
        $this->volvo = $volvo;
        $this->bike = $bike;
        $this->bikeDrunk = $bikeDrunk;
        $this->participants = $participants;
    }

    public function run()
    {
        $timer = 0;
        while (true) {

            $timer++;
            $this->race->finishReached($timer);
            $this->race->makeTracks();
            $this->race->placeParticipants($this->participants);
            print("\033[H\033[J");
            echo 'TIMER: ' . $timer;
            echo PHP_EOL . $this->opel->getSymbol() . ' ' . $this->opel->getResult() . PHP_EOL;
            echo $this->ww->getSymbol() . ' ' . $this->ww->getResult() . PHP_EOL;
            echo $this->volvo->getSymbol() . ' ' . $this->volvo->getResult() . PHP_EOL;
            echo $this->bike->getSymbol() . ' ' . $this->bike->getResult() . PHP_EOL;
            echo $this->bikeDrunk->getSymbol() . ' ' . $this->bikeDrunk->getResult() . PHP_EOL;

            $this->printTrack();
            sleep(1);
            $this->opel->move();
            $this->ww->move();
            $this->volvo->move();
            $this->bike->move();
            $this->bikeDrunk->move();

            if ($this->opel->getStatus() &&
                $this->ww->getStatus() &&
                $this->volvo->getStatus() &&
                $this->bike->getStatus() &&
                $this->bikeDrunk->getStatus()
            ) {
                $place = 1;
                foreach ($this->race->participantsRanking() as $participant) {
                    echo '[' . $place++ . '.place] ' . $participant->getSymbol() . ': result - ' . $participant->getResult() . PHP_EOL;
                }
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

}

