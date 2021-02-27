<?php
//Write a console program in a class named AsciiFigure that draws a figure of the following form, using for loops.
//
// ////////////////\\\\\\\\\\\\\\\\
// ////////////********\\\\\\\\\\\\
// ////////****************\\\\\\\\
// ////************************\\\\
// ********************************
//Then, modify your program using an integer class constant so that it can create a similar figure of any size.
//For instance, the diagram above has a size of 5. For example, the figure below has a size of 3:
//
// ////////\\\\\\\\
// ////********\\\\
// ****************
//And the figure below has a size of 7:
//
// ////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\
// ////////////////////********\\\\\\\\\\\\\\\\\\\\
// ////////////////****************\\\\\\\\\\\\\\\\
// ////////////************************\\\\\\\\\\\\
// ////////********************************\\\\\\\\
// ////****************************************\\\\
// ************************************************

class AsciiFigure
{
    private const heightThree = 3;
    private const heightFive = 5;
    private const heightSeven = 7;
    private const height = 6;
    private array $grid = [];

    public function create(int $height): array
    {
        if ($height == 3) {
            $height = self::heightThree;
        } else if ($height == 5) {
            $height = self::heightFive;
        } else if ($height == 7) {
            $height = self::heightSeven;
        } else {
            $height = self::height;
        }
        for ($i = 0; $i < $height; $i++) {
            for ($j = 1; $j < ($height - $i) * 4 - 3; $j++) {
                $this->grid[] = "/";
            }

            for ($p = 0; $p < $i * 8; $p++) {
                $this->grid[] = "*";
            }

            for ($j = 1; $j < ($height - $i) * 4 - 3; $j++) {
                $this->grid[] = "\\";
            }
            $this->grid[] = PHP_EOL;
        }
        return $this->grid;
    }

    public function draw(): string
    {
        return implode("", $this->grid);
    }

}

$figure = new AsciiFigure();
$height = readline("Choose height (3/5/7) : ");
$figure->create($height);
echo $figure->draw();



