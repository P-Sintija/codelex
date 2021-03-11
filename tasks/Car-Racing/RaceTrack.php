<?php

class RaceTrack
{
    private string $symbol = '';
    private int $trackLength;
    private int $trackAmount;
    private array $track;
    private MovableCollection $participants;
    private array $results;

    public function __construct(int $length, int $amount)
    {
        $this->trackLength = $length;
        $this->trackAmount = $amount;
    }

    public function setSymbol(string $symbol): void
    {
        $this->symbol = $symbol;
    }

    public function makeTracks(): void
    {
        $oneTrack = array_fill(0, $this->trackLength, $this->symbol);
        $this->track = array_fill(0, $this->trackAmount, $oneTrack);
    }

    public function getTrack(): array
    {
        return $this->track;
    }


    public function addParticipants(MovableCollection $participant): void
    {
        $this->participants = new MovableCollection;
        for ($i = 0; $i < $this->trackAmount; $i++) {
            $this->participants->addMovableItem($participant->getMovableItems()[$i]);
            if (count($this->participants->getMovableItems()) == $this->trackAmount) {
                break;
            }
        }
    }

    public function getParticipants(): MovableCollection
    {
        return $this->participants;
    }

    public function placeParticipants(MovableCollection $participant): void
    {
        for ($i = 0; $i < $this->trackAmount; $i++) {
            $player = $participant->getMovableItems()[$i];
            $this->track[$i][$player->getMileage()] = $player->getSymbol();
        }
    }


    public function finishReached(int $time): void
    {
        foreach ($this->participants->getMovableItems() as $participants) {
            if ($participants->getMileage() >= $this->trackLength - 1 &&
                !$participants->raceFinished()) {
                $participants->setMileage($this->trackLength - 1);
                $participants->setRaceFinished();
                $this->setResult($participants, $time);
            }
        }
    }

    private function setResult(Movable $participant, int $time): void
    {
        $this->results[$participant->getSymbol()] = $time;
    }

    public function getResults(): array
    {
        return $this->results;
    }

}

