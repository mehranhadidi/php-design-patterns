<?php

namespace Creational\AbstractFactory;

class HtmlText extends Text
{
    private $text;

    public function __construct($text)
    {
       $this->text = 'HTML: ' . $text . '\n\t';
    }
}