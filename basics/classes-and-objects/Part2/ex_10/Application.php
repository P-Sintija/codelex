<?php

class Application
{
    private VideoStore $store;

    public function __construct(VideoStore $store)
    {
        $this->store = $store;
    }

    function run()
    {
        while (true) {

            echo PHP_EOL;
            echo "Choose the operation you want to perform" . PHP_EOL;
            echo "Choose 0 for EXIT" . PHP_EOL;
            echo "Choose 1 to fill video store" . PHP_EOL;
            echo "Choose 2 to rent video (as user)" . PHP_EOL;
            echo "Choose 3 to return video (as user)" . PHP_EOL;
            echo "Choose 4 to list inventory" . PHP_EOL;
            echo 'Choose 5 to rate video' . PHP_EOL;

            $command = (int)readline('- ');

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    print("\033[2J\033[;H");
                    $movie = readline('Enter movie title: ');
                    $this->addMovies($movie);
                    break;
                case 2:
                    print("\033[2J\033[;H");
                    $title = readline('Enter movie title you want to rent: ');
                    $this->rentVideo($title);
                    break;
                case 3:
                    print("\033[2J\033[;H");
                    $title = readline('Movie returned : ');
                    $this->returnVideo($title);
                    break;
                case 4:
                    print("\033[2J\033[;H");
                    echo $this->listInventory();
                    break;
                case 5:
                    print("\033[2J\033[;H");
                    $title = readline('Movie title : ');
                    $rating = (int)readline('Movie rating 1-100(%): ');
                    $this->rateMovie($title, $rating);
                    break;
                default:
                    echo "Sorry, I don't understand you..";
            }
        }
    }

    private function addMovies(string $movie): void
    {
        $this->store->addVideo(new Video($movie));
    }

    private function rentVideo(string $title): void
    {
        $this->store->checkOut($title);
    }

    private function returnVideo(string $title): void
    {
        $this->store->returnVideo($title);
    }

    private function listInventory(): string
    {
        return $this->store->listInventory();
    }

    private function rateMovie(string $title, int $rating): void
    {
        $this->store->takeRating($title, $rating);
    }

}

