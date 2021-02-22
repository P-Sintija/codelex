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

class Point {
    public int $x;
    public int $y;
    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }
}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);

function swapPoints(Point $one, Point $two): array {
    $rememberX = $one->x;
    $rememberY = $one->y;

    $one->x = $two->x;
    $one->y = $two->y;
    $two->x = $rememberX;
    $two->y = $rememberY;

    return [$one, $two];

}

swapPoints($p1, $p2);

echo "(" . $p1->x . ", " . $p1->y . ")" . PHP_EOL;
echo "(" . $p2->x . ", " . $p2->y . ")";

