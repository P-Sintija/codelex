<?php
//The class Movie is started below. An instance of class Movie represents a film.
//This class has the following three class variables:
//
//title, which is a string representing the title of the movie
//studio, which is a string representing the studio that made the movie
//rating, which is a string representing the rating of the movie (i.e. PG­13, R, etc)

//Write a constructor for the class Movie, which takes the title of the movie, studio, and rating as its arguments,
//and sets the respective class variables to these values.

//Write a second constructor for the class Movie, which takes the title of the movie and studio as its arguments,
//and sets the respective class variables to these values, while the class variable rating is set to "PG".


//Write a method GetPG, which takes an array of base type Movie as its argument,
//and returns a new array of only those movies in the input array with a rating of "PG".
//You may assume the input array is full of Movie instances. The returned array may be empty.

//Write a piece of code that creates an instance of the class Movie:
//with the title “Casino Royale”, the studio “Eon Productions” and the rating “PG­13”;
//with the title “Glass”, the studio “Buena Vista International” and the rating “PG­13”;
//with the title “Spider-Man: Into the Spider-Verse”, the studio “Columbia Pictures” and the rating “PG”.

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
            return strpos($movie->getMovieRating(), $findRating) === 0;
        });
    }

}

$movieList = new MovieCollection();
$movieList->addMovie(new Movie('Casino Royale', 'Eon Productions', 'PG­13'));
$movieList->addMovie(new Movie('Glass', 'Buena Vista International', 'PG­13'));
$movieList->addMovie(new Movie('Spider-Man: Into the Spider-Verse', 'Columbia Pictures', 'PG'));

foreach ($movieList->getPG('PG') as $movie) {
    echo $movie->getMovieInfo();
}



