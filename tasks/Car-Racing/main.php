<?php

require_once 'RaceTrack.php';
require_once 'Movable.php';
require_once 'Car.php';
require_once 'Bike.php';
require_once 'MovableCollection.php';
require_once 'Layout.php';
require_once 'RaceApp.php';


$track = new RaceTrack(20, 5);
$track->makeTracks();

$opel = new Car(1, 3,30);
$ww = new Car (2, 3, 10);
$volvo = new Car ( 1, 5, 0);
$bike = new Bike ( 1, 2,5, 0);
$drunkBike = new Bike(1, 2,40, 3);


$participants = new MovableCollection;
$participants->addMovableItem($opel);
$participants->addMovableItem($ww);
$participants->addMovableItem($volvo);
$participants->addMovableItem($bike);
$participants->addMovableItem($drunkBike);


$track->addParticipants($participants);


$layout = new Layout;
$layout->addTrack($track);
$layout->addRacers([
    [$opel,'1'],
    [$ww, '2'],
    [$volvo, '3'],
    [$bike, '4'],
    [$drunkBike, '5']
]);


$race = new RaceApp($track);
$race->setLayout($layout);
$race->run();

