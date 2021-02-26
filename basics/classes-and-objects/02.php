<?php
//Write a method named swap_points that accepts two Points as parameters and swaps their x/y values.
//
//Consider the following example code that calls swapPoints:
//
//$p1 = new Point(5, 2);
//$p2 = new Point(-3, 6);
//swap_points(p1, p2);
//echo "(" . p1.x . ", " . p1.y . ")";
//echo "(" . p2.x . ", " . p2.y . ")";
//The output produced from the above code should be:
//
//(-3, 6)
//(5, 2)

class Point
{
    private int $x;
    private int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getPointValues(): array
    {
        return [$this->x, $this->y];
    }

    public function setValues(array $values): void
    {
        $this->x = $values[0];
        $this->y = $values[1];
    }
}


class PointSwapper
{
    private Point $pointOne;
    private Point $pointTwo;

    public function __construct(Point $pointOne, Point $pointTwo)
    {
        $this->pointOne = $pointOne;
        $this->pointTwo = $pointTwo;
    }

    public function swapPoints(Point $one, Point $two): void
    {
        $memory = $one->getPointValues();
        $one->setValues($two->getPointValues());
        $two->setValues($memory);

    }

}

$p1 = new Point (5, 2);
$p2 = new Point(-3, 6);

$swapper = new PointSwapper($p1, $p2);

$swapper->swapPoints($p1, $p2);

echo "(" . $p1->getPointValues()[0] . ", " . $p1->getPointValues()[1] . ")" . PHP_EOL;
echo "(" . $p2->getPointValues()[0] . ", " . $p2->getPointValues()[1] . ")";

