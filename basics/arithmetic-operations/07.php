<?php
//Modify the example program to compute the position of an object after falling for 10 seconds, outputting the position in meters.
//The formula in Math notation is:
//Gravity formula (folder)
//x(t) = 0.5 * a*t^2 + v*t + x;
//a - Acceleration(m/s^2) = -9.81
//t - Time(s) = 10
//v - Initial velocity(m/s) =0
//x - Initial position = 0
//Note: The correct value is -490.5m.

$acceleration = -9.81;
$time = 10;
$velocity = 0;
$position = 0;

$newPosition = 0.5 * $acceleration * pow($time, 2) + $velocity + $position;
echo $newPosition . " m";

