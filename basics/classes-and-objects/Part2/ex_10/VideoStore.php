<?php


class VideoStore
{
    private array $videoList;


    public function addVideo(Video $movie): void
    {
        $this->videoList[] = $movie;
    }

    public function checkOut(string $title): void
    {
        array_filter($this->videoList, function (Video $movie) use ($title) {
            if ($movie->getTitle() === $title) {
                $movie->checkOutMovie();
            }
        });
    }

    public function returnVideo(string $title): void
    {
        array_filter($this->videoList, function (Video $movie) use ($title) {
            if ($movie->getTitle() === $title) {
                $movie->checkInMovie();
            }
        });
    }

    public function takeRating(string $title, int $rating): void
    {
        array_filter($this->videoList, function (Video $movie) use ($title, $rating) {
            if ($movie->getTitle() === $title) {
                $movie->setRating($rating);
            }
        });
    }

    public function listInventory(): string
    {
        return implode(PHP_EOL, array_map(function ($movie) {
                return $movie->getTitle() .
                    '; average user rating: ' . $movie->getAverageRating() .
                    '%; ' . $movie->getFlag();
            }, $this->getAllVideos())) . PHP_EOL;
    }

    private function getAllVideos(): array
    {
        return $this->videoList;
    }

}


