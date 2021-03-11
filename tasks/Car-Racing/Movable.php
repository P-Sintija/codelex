<?php
interface Movable
{
    public function getSymbol(): string;

    public function getPosition(): int;

    public function move(): void;

    public function setAtFinish(int $position): void;

    public function setResult(int $time): void;

    public function getResult(): int;

    public function setStatus(bool $finished): void;

    public function getStatus(): bool;

}

