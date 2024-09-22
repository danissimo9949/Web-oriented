<?php

interface IColorful{
    public function getColor();
}

interface IShapeCalculator{
    public function calculateArea();
    public function calculatePerimeter();
}

class Rectangle implements IShapeCalculator, IColorful{

    private $width;
    private $length;
    private $color;

    public function __construct($width, $length, $color = "White")
    {
        $this->width = $width;
        $this->length = $length;
        $this->color = $color;
    }

    public function setColor($color){
        $this->color = $color;
    }

    public function getColor(){
        return $this->color;
    }

    public function calculateArea(){
        return $this->width * $this->length;
    }

    public function calculatePerimeter(){
        return 2 * ($this->width + $this->length);
    }
}

$rectangle = new Rectangle(10,20);
echo "{$rectangle->calculateArea()}<br>";
echo "{$rectangle->calculatePerimeter()}<br>";
$rectangle->setColor("Red");
echo "{$rectangle->getColor()}<br>";
?>