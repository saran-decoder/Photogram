<?php

/**
 * Access Specifiers
 * -----------------
 * pubic
 * private
 * protected
 */

class Mic
{
    private $brand;
    public $color;
    public $usb_port;
    public $model;
    private $light;
    public $price;
    public static $test;

    public function __call($name, $arguments)
    {
        print("\nCalling: $name\n");
        print_r($arguments);
        print("\n");
        return "Hello-return";
    }

    public static function testFunction()
    {
        printf("This is a static function, this can be run without object initialization. ");
    }

    public function __construct($brand)
    {
        printf("Constructing object...");
        $this->brand = ucwords($brand);
        Mic::testFunction();
    }

    public function setLight($light)
    {
        $this->light = $light;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function add($a, $b)
    {
        return $a+$b;
    }

    private function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = ucwords($model);
    }

    public function getModelProxy()
    {
        return $this->getModel();
    }

    public function __destruct()
    {
        printf("Destruct object: brand: $this->brand...");
    }
}

class DupMic
{
    public static function testFunction()
    {
        return "hello";
    }
}

function testFunction()
{
    printf("This is a static function, this can be run without object initialization.");
}
