<?php

namespace Creational\AbstractFactory;

abstract class Text
{
    private $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function __get($text)
    {
        return $this->$text;
    }
}