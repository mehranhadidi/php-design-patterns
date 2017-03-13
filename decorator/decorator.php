<?php

// common interface to all decorator parts
interface CarService
{
    public function getCost();
}

// define multiple actions that need to interact based on core action. example is CarService price.
class BasicInspection implements CarService
{
    public function getCost()
    {
        return 25;
    }
}

class OilChange implements CarService
{
    protected $carService;

    function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 19 + $this->carService->getCost();
    }
}

class useWax implements CarService
{
    protected $carService;

    function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 11 + $this->carService->getCost();
    }
}


// different usages :
echo (new OilChange(new useWax(new BasicInspection())))->getCost(); // will calculate oil price + wax price + basic car service price
echo (new useWax(new BasicInspection()))->getCost(); // will calculate wax price + basic car service price
echo (new OilChange(new BasicInspection()))->getCost(); // will calculate oil price + basic car service price

/*
 * You can continue these actions as much as you want. all depends on core service actions.
 * You can also find more info on :
 * @link: https://sourcemaking.com/design_patterns/decorator/php
 *
 */