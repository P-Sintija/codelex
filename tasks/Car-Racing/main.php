<?php

require_once 'RaceTrack.php';
require_once 'Movable.php';
require_once 'Car.php';
require_once 'Bike.php';
require_once 'MovableCollection.php';
require_once 'RaceApp.php';


$track = new RaceTrack(20, 5);
$track->makeTracks();

$opel = new Car('O', 1, 3);
$ww = new Car ('W', 2, 3);
$volvo = new Car ('V', 1, 5);
$bike = new Bike ('@', 1,2,0);
$drunkBike = new Bike('%', 1,2,3);


$participants = new MovableCollection;
$participants->addMovableItem($opel);
$participants->addMovableItem($ww);
$participants->addMovableItem($volvo);
$participants->addMovableItem($bike);
$participants->addMovableItem($drunkBike);


$track->addParticipants($participants);

$race = new RaceApp($track, $opel, $ww, $volvo, $bike, $drunkBike, $participants);
$race->run();





