<?php
$line = '';
$v = 3;
$h = 4;

  for ($i = 1; $i <= $v; $i++) {
    for ($j = 1; $j <= $v + ($h - $v); $j++) {
        if ($i <= $v  && ($i === $j || $j ===$v - $i + 3)) {
            echo $line = 'a';
        } else {
          echo  $line = '.';
        }
    } echo $line = PHP_EOL;
  }

