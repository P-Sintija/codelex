<?php

class SlotMachine2
{
    ///// const raksta ar uppercase un _ ;

    private array $elements = [];
    private const VERTICAL_SLOT_COUNT = 3;
    private const HORIZONTAL_SLOTS_COUNT_MIN = 3;
    private ?int $selectedHorizontalSize;
    private array $slots;
    private array $lines = [];

    public function __construct(
        array $elements,
        ?int $size = null
    )
    {
        /*  foreach ($elements as $element) {
              if ($element instanceof Element) {
                  $this->elements[] = $element;
              }
          }*/

        $this->setElements($elements);
        $this->setHorizontalSlots($size);

    }

    public function slots(): array
    {
        return $this->slots;
    }

    public function roll(): void
    {
        for ($i = 0; $i < self::VERTICAL_SLOT_COUNT; $i++) {
            for ($j = 0; $j < $this->selectedHorizontalSize; $j++) {
                $randomElement = $this->elements[array_rand($this->elements)];
                $this->slots[$i][$j] = $randomElement;
            }
        }

        $this->formLines();
    }


    public function getRewards(Player $user): int
    {
        $reward = 0;

       foreach ($this->lines as $line) {
            $reward += $line->getReward($user);
        }
        return $reward;
    }





    private function setElements(array $elements): void
    {
        foreach ($elements as $element) {
            $this->setElement($element);
        }
    }

    private function setElement(Element $element): void
    {
        $this->elements[] = $element;
    }

    private function setHorizontalSlots(?int $size): void
    {
        if ($size < 3 || $size == null) {
            $this->selectedHorizontalSize = self::HORIZONTAL_SLOTS_COUNT_MIN;
        } else {
            $this->selectedHorizontalSize = $size;
        }
    }

    private function formLines(): void
    {
        $this->registerBaseLines();
        $this->registerDiagonalOne();
        $this->registerDiagonalTwo();
    }

    private function registerBaseLines(): void
    {
        for ($i = 0; $i < self::VERTICAL_SLOT_COUNT; $i++) {
            $this->lines[] = new Line($this->slots[$i]);
        }
    }

    private function registerDiagonalOne(): void
    {
        $line = new Line();
        $rowNr = -1;
        for ($i = 0; $i < $this->selectedHorizontalSize; $i++) {
            $direction = intdiv($i, self::VERTICAL_SLOT_COUNT) % 2 === 0 ? -1 : 1;
            $rowNr -= $direction;
            $line->addElement($this->slots[$rowNr][$i]);
        }
        $this->lines[] = $line;
    }

    private function registerDiagonalTwo(): void
    {
        $line = new Line();
        $rowNr = self::VERTICAL_SLOT_COUNT;
        for ($i = 0; $i < $this->selectedHorizontalSize; $i++) {
            $direction = intdiv($i, self::VERTICAL_SLOT_COUNT) % 2 === 0 ? -1 : 1;
            $rowNr += $direction;
            $line->addElement($this->slots[$rowNr][$i]);
        }
        $this->lines[] = $line;
    }

}




