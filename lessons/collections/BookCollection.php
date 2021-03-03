<?php

class BookCollection
{
    private array $books = [];

    public function add(Book $book): void
    {
        $this->books[] = $book;
    }

    public function removeAt (int $index): void
    {
       /* if (isset($this->books[$index])){
            unset($this->books[$index]);
        }*/

        if (!isset($this->books[$index])){
           throw new OutOfRangeException('Book at index ' . $index . ' not exists');
        }
    }

    public function all(): array
    {
        return $this->books;
    }

}


