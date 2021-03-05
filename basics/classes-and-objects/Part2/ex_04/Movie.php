<?php
class Movie
{
    private string $title;
    private string $studio;
    private string $rating;

    public function __construct(string $title, string $studio, string $rating)
    {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }

    public function getMovieInfo(): string
    {
        return 'Movie title: ' . $this->title . '; studio: ' . $this->studio . '; rating: ' . $this->rating . PHP_EOL;
    }

    public function getMovieRating(): string
    {
        return $this->rating;
    }

}

