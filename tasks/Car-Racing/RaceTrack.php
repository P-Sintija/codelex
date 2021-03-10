<?php

class RaceTrack
{

    private int $trackLength;
    private int $trackAmount;
    private array $track;

    private array $participants;
    //private MovableCollection $participants;

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
        for($i=0;$i<$this->trackAmount;$i++){

            $this->participants[] = $participant->getMovableItems()[$i];

            //$this->participants->addMovableItem($participant->getMovableItems()[$i]);


            if(count($this->participants) == $this->trackAmount) {

           // if(count($this->participants->getMovableItems()) == $this->trackAmount) {
                break;
            }
        }
    }


}

