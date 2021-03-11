<?php

class Layout
{
    private RaceTrack $track;
    private array $racers = [];

    public function addTrack(RaceTrack $track): void
    {
        $this->track = $track;
    }

    public function addRacers(array $racers): void
    {
        foreach ($racers as $racer) {
            if ($racer[0] instanceof Movable) {
                $this->racers[] = $racer;
            }
        }

    }


    public function setLayout(): void
    {
        $this->trackLayout($this->track, '*');

        foreach ($this->racers as $racer) {
            $this->racerLayout($racer[0], $racer[1]);
        }
    }


    private function trackLayout(RaceTrack $track, string $symbol): void
    {
        $this->layoutValidation($symbol);
        $track->setSymbol($symbol);
    }

    private function racerLayout(Movable $racer, string $symbol): void
    {
        if ($racer->hasCrushed()) {
            $racer->setSymbol('X');
        } else {
            $this->layoutValidation($symbol);
            $racer->setSymbol($symbol);
        }
    }

    private function layoutValidation(string $symbol): string
    {
        if (strlen($symbol) > 1) {
            $symbol = $symbol[0];
        }
        return $symbol = strlen($symbol);
    }

}

