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
    const  height = 7;
    public array $grid;

    public function __construct()
    {
        $this->grid = [];
    }


    function create(): array
    {
        for ($i = 0; $i < self::height; $i++) {
            for ($j = 1; $j < (self::height - $i) * 4 - 3; $j++) {
                $this->grid[] = "/";
            }

            for ($p = 0; $p < $i * 8; $p++) {

                $this->grid[] = "*";
            }

            for ($j = 1; $j < (self::height - $i) * 4 - 3; $j++) {
                $this->grid[] = "\\";
            }
            $this->grid[] = PHP_EOL;
        }
        return $this->grid;
    }

    function draw(): string
    {
        return implode("", $this->grid);
    }

}

$figure = new AsciiFigure();
$figure->create();
echo $figure->draw();



