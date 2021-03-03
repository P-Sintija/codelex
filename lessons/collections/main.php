<?php

//masīvs, kurš ievietots objektā;
//exception ir izņēmumu gadījumiem - apstādina programmu;

require_once 'Book.php';
require_once 'BookCollection.php';

$books = new BookCollection();
$books ->add(new Book());
$books->add(new Book());

//$books->removeAt(1);
//var_dump($books);

try {
    $books->removeAt(2);
} catch (OutOfRangeException $exception) {
    var_dump($exception->getMessage());
}

var_dump($books);



