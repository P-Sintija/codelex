<?php

//apraksta PUBLISKAS metodes, bet NE private vai protected;
// teorētiski arī publiskus propertijus;
// vienam objektam var būt arī vairāki interfeisi !!!! ne vairāk kā 3



interface StorageInterface
{
    public function save(): void;

}


class DatabaseStorage implements StorageInterface
{

    public function save(): void
    {
        var_dump('saving in database');
    }

    private function bla(): void
    {

    }

    public function blaBla(): void
    {

    }
}


$data = new DatabaseStorage();

class Sock implements StorageInterface
{
    public function save(): void
    {
        var_dump('saving in sock');
    }
}


class Application
{
    public function run(StorageInterface $storage)
    {
        $storage->save();
    }
}

(new Application())->run(new DatabaseStorage());
(new Application())->run(new Sock());


