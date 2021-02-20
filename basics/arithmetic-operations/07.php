<?php
//Modify the example program to compute the position of an object after falling for 10 seconds, outputting the position in meters.
//The formula in Math notation is:
//Gravity formula (folder)

//Note: The correct value is -490.5m.

$acceleration = -9.81;
$time = 10;
$velocity = 0;
$position = 0;

$newPosition = 0.5 * $acceleration * pow($time, 2) + $velocity + $position;
echo $newPosition . " m";

