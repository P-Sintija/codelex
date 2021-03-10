<?php

require_once 'RaceTrack.php';
require_once 'Movable.php';
require_once 'Car.php';
require_once 'MovableCollection.php';



$track = new RaceTrack(20, 3);
$track->makeTracks();

$opel = new Car('Opel','O', 1, 1);
$ww = new Car ('WW','W', 1, 2);
$volvo = new Car ('Volvo', 'V',1, 3);
$a = new Car('a', 'a',1,1);

$participants = new MovableCollection;
$participants->addMovableItem($opel);
$participants->addMovableItem($ww);
$participants->addMovableItem($volvo);
$participants->addMovableItem($a);


$track->addParticipants($participants);

var_dump($track);

function printTrack(RaceTrack $track): void
{
    foreach ($track->getTrack() as $road) {
        echo implode('', $road) . PHP_EOL;
    }
}

//printTrack($track);





