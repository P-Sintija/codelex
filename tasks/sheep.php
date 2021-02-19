<?php
$animalsArray = ["sheep", "sheep", "sheep", "wolf", "sheep", "wolf", "sheep", "sheep"];


for ($i = 0; $i < count($animalsArray); $i++) {

    if ($animalsArray[$i] === "wolf") {
        echo "HERE" . PHP_EOL;
        continue;
    }
    if ((isset($animalsArray[$i - 1]) && $animalsArray[$i - 1] === "wolf") || (isset($animalsArray[$i + 1]) && $animalsArray[$i + 1] === "wolf")) {
        echo "OMG" . PHP_EOL;
        continue;
    }
    echo "happy" . PHP_EOL;
}




