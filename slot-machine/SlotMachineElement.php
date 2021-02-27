<?php

class SlotMachineElement
{
    private string $name;

    public function __construct(string $element)
    {
        $this->name = $element;
    }

    public function getElement(): string
    {
        return $this->name;
    }





}


