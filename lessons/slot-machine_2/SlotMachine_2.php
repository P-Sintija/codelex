<?php

class SlotMachine_2
{
    ///// const raksta ar uppercase un _ ;
    private array $slots = [];
    private array $lines = [];
    private array $elements = [];
    private int $verticalSlotsCount;
    private int $horizontalSlotsCount;

    public function __construct(
        array $elements,
        int $horizontalSlotsCount = 3,
        int $verticalSlotsCount = 3

    )
    {
        /*  foreach ($elements as $element) {
              if ($element instanceof Element) {
                  $this->elements[] = $element;
              }
          }*/

        $this->setElements($elements);
        $this->horizontalSlotsCount = $horizontalSlotsCount;
        $this->verticalSlotsCount = $verticalSlotsCount;

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
        $this->registerBaseLines();
        $this->registerDiagonals();


    }

    private function registerBaseLines(): void
    {
        for ($i = 0; $i < $this->verticalSlotsCount; $i++) {

            //todo jāuztaisa pārbaudes funkcija, lai zina, ka liek iekšā līniju
            //todo neskaita, ja ir ABDDDD piemēram
            $this->lines[] = new Line($this->slots[$i]);
            var_dump($i);
        }
    }

    private function registerDiagonals(): void
    {
        $line = new Line();
        $rowNr = -1;
        for ($i = 0; $i < $this->horizontalSlotsCount; $i++) {
            $direction = intdiv($i, $this->verticalSlotsCount) % 2 === 0 ? -1 : 1;
            $rowNr -= $direction;
            var_dump($rowNr . $i);
            $line->addElement($this->slots[$rowNr][$i]);
        }
        $this->lines[] = $line;
    }


    private function setElements(array $elements): void
    {
        foreach ($elements as $element) {
            $this->setElement($element);
        }
    }


}




