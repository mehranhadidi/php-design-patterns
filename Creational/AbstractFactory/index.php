<?php
// load the composer autoloader
require_once "vendor/autoload.php";

use Creational\AbstractFactory\HtmlFactory;
//use Creational\AbstractFactory\JsonFactory;


// create html text
$factory = new HtmlFactory();
$text = $factory->createText('Hello World'); // will generate HTML text
var_dump($text->text);
//echo $text;

// create json text
//$factory = new JsonFactory();
//$factory->createText('Hello World'); // will generate JSON text

