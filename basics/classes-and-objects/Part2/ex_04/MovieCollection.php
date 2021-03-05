<?php

class MovieCollection
{
    private array $movieList;

    public function addMovie(Movie $input): void
    {
        $this->movieList [] = $input;
    }

    public function getPG(string $findRating): array
    {
        return array_filter($this->movieList, function (Movie $movie) use ($findRating) {
            return strpos($movie->getMovieRating(), $findRating) === 0 && strlen($movie->getMovieRating()) === 2;
        });
    }

}

