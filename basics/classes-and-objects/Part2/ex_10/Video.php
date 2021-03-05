<?php


class Video
{
    private string $title;
    private bool $flag = true;
    private array $averageRating = [];

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getFlag(): string
    {
        if ($this->flag) {
            return 'IS in store';
        }
        return 'IS NOT in store';
    }

    public function checkOutMovie(): void
    {
        $this->flag = false;
    }

    public function checkInMovie(): void
    {
        $this->flag = true;
    }

    public function setRating(int $rating): void
    {
        if ($rating < 0 || $rating > 100) return;
        $this->averageRating[] = $rating;
    }

    public function getAverageRating(): float
    {
        if (count($this->averageRating) > 0) {
            return number_format(array_sum($this->averageRating) / count($this->averageRating), 2);
        }
        return 0;
    }

}



