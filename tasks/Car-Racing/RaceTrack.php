<?php

class RaceTrack
{

    private int $trackLength;
    private int $trackAmount;
    private array $track;
    private MovableCollection $participants;


    public function __construct(int $length, int $amount)
    {
        $this->trackLength = $length;
        $this->trackAmount = $amount;
    }

    public function makeTracks(): void
    {
        $oneTrack = array_fill(0, $this->trackLength, '*');
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

    public function placeParticipants(MovableCollection $participant): void
    {
        for ($i = 0; $i < $this->trackAmount; $i++) {
            $player = $participant->getMovableItems()[$i];
            $this->track[$i][$player->getPosition()] = $player->getSymbol();
        }
    }

    public function finishReached(int $time): void
    {
        foreach ($this->participants->getMovableItems() as $participants) {
            if ($participants->getPosition() >= $this->trackLength - 1) {
                $participants->setAtFinish($this->trackLength - 1);
                $participants->setResult($time);
                $participants->setStatus(true);
            }
        }
    }

    public function participantsRanking(): array
    {
        $ranking = $this->participants->getMovableItems();
        usort($ranking, function ($participantOne, $participantTwo) {
            return $participantOne->getResult() > $participantTwo->getResult();
        });
        return $ranking;
    }


}

