<?php
//Write a console program in a class named NumberSquare that prompts the user for two integers, a min and a max,
//and prints the numbers in the range from min to max inclusive in a square pattern.
//Each line of the square consists of a wrapping sequence of integers increasing from min and max.
//The first line begins with min, the second line begins with min + 1, and so on.
//When the sequence in any line reaches max, it wraps around back to min.
//You may assume that min is less than or equal to max. Here is an example dialogue:
//
//Min? 1
//Max? 5
//12345
//23451
//34512
//45123
//51234

class NumberSquare
{
    public string $min;
    public string $max;
    public array $square;

    public function __construct()
    {
        $this->min = readline("Enter min : ");
        $this->max = readline("Enter max : ");
        $this->square = [];
    }

    function createSquare(): array
    {

        for ($i = $this->min; $i <= $this->max; $i++) {
            for ($j = $i; $j <= $this->max; $j++) {
                $this->square[] = $j;
            }
            for ($j = $this->min; $j < $i; $j++) {
                $this->square[] = $j;
            }
            $this->square[] = PHP_EOL;
        }
        return $this->square;
    }

    function drawSquare(): string
    {
        return implode(" ", $this->square);
    }

}


$grid = new NumberSquare();
$grid->createSquare();
echo $grid->drawSquare();
