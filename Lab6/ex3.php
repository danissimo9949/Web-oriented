<?php

interface Vehicle {
    public function getDetails();
    public function clone(): Vehicle;
}

class Car implements Vehicle {
    private $type;

    public function __construct($type) {
        $this->type = $type;
    }

    public function getDetails() {
        return "{$this->type} Car";
    }

    public function clone(): Vehicle {
        return clone $this;
    }
}

class Truck implements Vehicle {
    private $type;

    public function __construct($type) {
        $this->type = $type;
    }

    public function getDetails() {
        return "{$this->type} Truck";
    }

    public function clone(): Vehicle {
        return clone $this;
    }
}

class Bus implements Vehicle {
    private $type;

    public function __construct($type) {
        $this->type = $type;
    }

    public function getDetails() {
        return "{$this->type} Bus";
    }

    public function clone(): Vehicle {
        return clone $this;
    }
}

class VehiclePrototypeRegistry {
    private $vehicles = [];

    
    public function addVehicle($key, Vehicle $vehicle) {
        $this->vehicles[$key] = $vehicle;
    }

   
    public function getVehicle($key): Vehicle {
        return $this->vehicles[$key]->clone();
    }
}


$prototypeRegistry = new VehiclePrototypeRegistry();
$prototypeRegistry->addVehicle('ua_car', new Car('Ukrainian'));
$prototypeRegistry->addVehicle('ua_truck', new Truck('Ukrainian'));
$prototypeRegistry->addVehicle('ua_bus', new Bus('Ukrainian'));

$prototypeRegistry->addVehicle('foreign_car', new Car('Foreign'));
$prototypeRegistry->addVehicle('foreign_truck', new Truck('Foreign'));
$prototypeRegistry->addVehicle('foreign_bus', new Bus('Foreign'));

function demoPrototype(VehiclePrototypeRegistry $registry, $type) {
    $cars = [];
    for ($i = 0; $i < 2; $i++) {
        $cars[] = $registry->getVehicle("{$type}_car");
    }

    $trucks = [];
    for ($i = 0; $i < 2; $i++) {
        $trucks[] = $registry->getVehicle("{$type}_truck");
    }

    $buses = [];
    for ($i = 0; $i < 2; $i++) {
        $buses[] = $registry->getVehicle("{$type}_bus");
    }

    echo "Car Park:\n";
    foreach ($cars as $car) {
        echo $car->getDetails() . "\n";
    }

    echo "\nTruck Park:\n";
    foreach ($trucks as $truck) {
        echo $truck->getDetails() . "\n";
    }

    echo "\nBus Park:\n";
    foreach ($buses as $bus) {
        echo $bus->getDetails() . "\n";
    }
}

echo "Using Ukrainian Vehicle Prototypes:\n";
demoPrototype($prototypeRegistry, 'ua');
echo "\n";

echo "Using Foreign Vehicle Prototypes:\n";
demoPrototype($prototypeRegistry, 'foreign');
?>