<?php

// core interface that main class forced to implements it
interface BookInterface
{
    public function open();

    public function turnPage();
}

// an adapter to translate normal class to core interface requested
class KindleAdapter implements BookInterface
{
    private $kindle;

    function __construct(Kindle $kindle)
    {
        $this->kindle = $kindle;
    }

    public function open()
    {
        return $this->kindle->turnOn();
    }

    public function turnPage()
    {
        return $this->kindle->clickOnNextButton();
    }
}

// Digital Book (this class cannot use in the Person class because the methods are not set correctly so we should adapt it)
class Kindle
{
    public function turnOn()
    {
        var_dump('turn on the kindle');
    }

    public function clickOnNextButton()
    {
        var_dump('next button on kindle tapped');
    }
}

// core interface that all endpoint work based on it so everything else should implement this class
class Book implements BookInterface
{
    public function open()
    {
        var_dump('open the book');
    }

    public function turnPage()
    {
        var_dump('turn the book page');

    }
}

// Usage :
class Person
{
    public function read(BookInterface $book)
    {
        $book->open();
        $book->turnPage();
    }
}

(new Person)->read(new Book); // run paper book methods
(new Person)->read(new KindleAdapter(new Kindle)); // run digital book that are adapted to core interface (BookInterface)