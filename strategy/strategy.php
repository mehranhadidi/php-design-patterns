<?php
/*
 * Strategy Design Pattern
 */


// encapsulate & make them interchangeable
interface Logger
{
    public function log($data);
}

// Family algorithms
class LogToFile implements Logger
{
    public function log($data)
    {
        var_dump('logging to file');
    }
}

class LogToDatabase implements Logger
{
    public function log($data)
    {
        var_dump('logging to database');
    }
}

class LogToWebservice implements Logger
{
    public function log($data)
    {
        var_dump('logging to webservice');
    }
}

// Implementation & Usage
class App
{
    public function log($data, Logger $logger = null)
    {
        $logger = $logger ?: new LogToFile;
        $logger->log($data);
    }
}

$app = new App;
$app->log('hello world'); // output: log to file
$app->log('hello world', new LogToDatabase); // output: log to database
$app->log('hello world', new LogToWebservice); // output: log to web service

/**
 * More information about strategy pattern
 * @link: https://en.wikipedia.org/wiki/Strategy_pattern
 */
