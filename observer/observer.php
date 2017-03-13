<?php

/*
 * Create 2 interface to Subject & Observer
 *
 * Subject is actually a concept of Object
 * Observer is a dependent job related to a subject
 *
 * Subject will call its observer's handle on any changes.
 */

// Object concept
interface Subject
{
    public function attach($observable);
    public function detach($index);
    public function notify();
}

// Dependent job related to a subject
interface Observer
{
    public function handle();
}

// example :

// login is a subject
class login implements Subject
{
    protected $observers = [];

    public function attach($observable)
    {
        if(is_array($observable))
        {
            return $this->attachObservers($observable);
        }

        $this->observers[] = $observable;
    }

    public function detach($index)
    {
        unset($this->observers[$index]);
    }

    public function notify()
    {
        foreach ($this->observers as $observer)
        {
            $observer->handle();
        }
    }

    private function attachObservers($observable)
    {
        foreach ($observable as $observer)
        {
            if( ! $observer instanceof Observer)
                throw new Exception;

            $this->attach($observer);
        }

        return;
    }

    public function fire()
    {
        $this->notify();
    }
}

// list of jobs that can use in subjects
class LogHandler implements Observer
{
    public function handle()
    {
        var_dump('Log to a file.');
    }
}

class EmailHandler implements Observer
{
    public function handle()
    {
        var_dump('Send an email.');
    }
}

// create a subject
$login = new Login;

// attach some jobs
$login->attach([
   new LogHandler(),
   new EmailHandler(),
]);

// fire the jobs
$login->fire();

/*
 * Decorator pattern mostly use to create events for objects
 *
 * For more information see :
 * @link: https://en.wikipedia.org/wiki/Observer_pattern
 */