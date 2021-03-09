<?php

class Line
{
    private array $elements = [];

    public function __construct(array $elements = [])
    {
        foreach ($elements as $element) {
            $this->addElement($element);
        }
    }


    public function addElement(Element $element): void
    {
        $this->elements[] = $element;
    }

    public function getReward(Player $user): int
    {
        $firstElement = null;
        $equalElements = 1;

        foreach ($this->elements as $element) {
            if ($firstElement === null) {
                $firstElement = $element;
                continue;
            }
            if ($element->symbol() != $firstElement) break;

            $equalElements++;
        }

        $this->clearLines();
        return $equalElements >= 3 ? $firstElement->reward() * $equalElements * $user->getBet() : 0; // 5 - lai visi 5 vienādi ne tikai 3 no sākuma
    }

    private function clearLines(): void
    {
        $this->elements = [];
    }

}



