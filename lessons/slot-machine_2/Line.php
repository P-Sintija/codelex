<?php

class Line
{
    private  array $elements = [];

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

    public function getReward(): int
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
        return $equalElements === 5 ? $firstElement->reward() * $equalElements : 0; // 5 - lai visi 5 vienādi ne tikai 3 no sākuma
    }


}



