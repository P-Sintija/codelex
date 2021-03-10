<?php
class MovableCollection
{
    private array $movableItems;

    public function addMovableItem(Movable $movable): void
    {
        $this->movableItems[] = $movable;
    }

    public function getMovableItems(): array
    {
        return $this->movableItems;
    }


}
