<?php 

class Automobile 

{     private $vehicleMake; 

    private $vehicleModel; 


    public function __construct($make, $model) //setting all attributes

    { 

        $this->vehicleMake = $make; 

        $this->vehicleModel = $model; 

    } 


    public function getMakeAndModel() //getting model

    { 

        return $this->vehicleMake . ' ' . $this->vehicleModel; 

    } } 


class AutomobileFactory //factory template

{     public static function create($make, $model) 

    { 

        return new Automobile($make, $model);//returns an class object

    } 

} 


// have the factory create the Automobile object 

$veyron = AutomobileFactory::create('Bugatti', 'Veyron');//creating an class object 


print_r($veyron->getMakeAndModel());