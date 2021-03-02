<?php

class SlotMachine_2
{
    private array $slots = [];
    private array $lines = [];
    private array $elements = [];
    private int $verticalSlotsCount;
    private int $horizontalSlotsCount;

    public function __construct(
        array $elements,
        int $verticalSlotsCount = 3,
        int $horizontalSlotsCount = 3
    )
    {
        /*  foreach ($elements as $element) {
              if ($element instanceof Element) {
                  $this->elements[] = $element;
              }
          }*/

        $this->setElements($elements);
        $this->verticalSlotsCount = $verticalSlotsCount;
        $this->horizontalSlotsCount = $horizontalSlotsCount;
    }

    public function setElement(Element $element): void
    {
        $this->elements[] = $element;
    }

    public function roll(): void
    {
        for ($i = 0; $i < $this->verticalSlotsCount; $i++) {
            for ($j = 0; $j < $this->horizontalSlotsCount; $j++) {
                $randomElement = $this->elements[array_rand($this->elements)];
                $this->slots[$i][$j] = $randomElement;
            }
        }

        $this->formLines();
    }


    public function slots(): array
    {
        return $this->slots;
    }

    public function getRewards(): int
    {
        $reward = 0;

        foreach ($this->lines as $line) {
            $reward += $line->getReward();
        }

        return $reward;
    }


    private function formLines(): void
    {
        for ($i = 0; $i < $this->verticalSlotsCount; $i++) {

            //jāuztaisa pārbaudes funkcija, lai zina, ka liek iekšā līniju
            $this->lines[] = new Line($this->slots[$i]);
        }
        // todo Logic to add diagonals
    }


    private function setElements(array $elements): void
    {
        foreach ($elements as $element) {
            $this->setElement($element);
        }
    }


}




