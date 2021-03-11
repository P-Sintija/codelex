<?php

interface Movable
{
    public function setSymbol(string $symbol): void;

    public function setCrushAbility(int $crushAbility): void;

    public function getSymbol(): string;

    public function move(): void;

    public function setMileage(int $position): void;

    public function getMileage(): int;

    public function crush(): void;

    public function stop(): void;

    public function setRaceFinished(): void;

    public function hasCrushed(): bool;

    public function raceFinished(): bool;
}

