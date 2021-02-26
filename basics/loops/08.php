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
    private string $min;
    private string $max;
    private array $square;


    public function setMin(): void
    {
        $this->min = readline("Enter min : ");
    }

    public function setMax(): void
    {
        $this->max = readline("Enter max : ");
    }

    public function createSquare(): array
    {

        for ($i = $this->min; $i <= $this->max; $i++) {
            for ($j = $i; $j <= $this->max; $j++) {
                $this->square[] = $j;
            }
            for ($p = $this->min; $p < $i; $p++) {
                $this->square[] = $p;
            }
            $this->square[] = PHP_EOL;
        }
        return $this->square;
    }

    public function drawSquare(): string
    {
        return implode(" ", $this->square);
    }

}


$grid = new NumberSquare();
$grid->setMin();
$grid->setMax();
$grid->createSquare();
echo $grid->drawSquare();

