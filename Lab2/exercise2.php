<?php

class BaseRectangle{

    protected float $sideA;
    protected float $sideB;
    protected static float $sumOfSides = 0;

    public function __construct(float $sideA, float $sideB)
    {
        $this->sideA = $sideA;
        $this->sideB = $sideB;
        self::$sumOfSides += 2 * ($sideA + $sideB);
    }

    public function calculateSquare(){
        return $this->sideA * $this->sideB;
    }

    public function calculatePerimeter(){
        return 2 * ($this->sideA + $this->sideB);
    }

    public static function getSumOfSides(){
        return self::$sumOfSides;
    }

    public function __toString()
    {
        return "This is the base rectangle with {$this->sideA} length and {$this->sideB} width";
    }

    public function __destruct()
    {
        echo "This base rectangle was succesful destructed";
    }
}

class Quad extends BaseRectangle{

    public function __construct(float $side)
    {
        parent::__construct($side, $side);
    }

    public function __toString()
    {
        return "This is the base rectangle with {$this->sideA} length and {$this->sideB} width";
    }

    public function __destruct()
    {
        echo "This quad was succesful destructed";
    }
}


class Rectangle extends BaseRectangle{

    public function __construct(float $sideA, float $sideB)
    {
        parent::__construct($sideA, $sideB);
    }

    public function __toString()
    {
        return "This is the normal rectangle with {$this->sideA} length and {$this->sideB} width";
    }

    public function __destruct()
    {
        echo "This normal rectangle was succesful destructed";
    }
}

echo "Quad<br>";
$quad = new Quad(10);
echo "Perimeter -> {$quad->calculatePerimeter()}<br>";
echo "Square -> {$quad->calculateSquare()}<br>";
echo "Rectangle<br>";
$rectangle = new Rectangle(10, 20);
echo "Perimeter -> {$rectangle->calculatePerimeter()}<br>";
echo "Square -> {$rectangle->calculateSquare()}<br>";

echo "Working with static method<br>";
// Static fields and methods
echo "Sum of all sides ->" . BaseRectangle::getSumOfSides() . "<br>";

?>