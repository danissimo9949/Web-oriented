<?php

interface Car {
    public function getDetails();
}

interface Truck {
    public function getDetails();
}

interface Bus {
    public function getDetails();
}

class UkrainianCar implements Car {
    public function getDetails() {
        return "Ukrainian Car";
    }
}

class UkrainianTruck implements Truck {
    public function getDetails() {
        return "Ukrainian Truck";
    }
}

class UkrainianBus implements Bus {
    public function getDetails() {
        return "Ukrainian Bus";
    }
}

class ForeignCar implements Car {
    public function getDetails() {
        return "Foreign Car";
    }
}

class ForeignTruck implements Truck {
    public function getDetails() {
        return "Foreign Truck";
    }
}

class ForeignBus implements Bus {
    public function getDetails() {
        return "Foreign Bus";
    }
}

interface VehicleFactory {
    public function createCar(): Car;
    public function createTruck(): Truck;
    public function createBus(): Bus;
}

class UAVehicleFactory implements VehicleFactory {
    public function createCar(): Car {
        return new UkrainianCar();
    }

    public function createTruck(): Truck {
        return new UkrainianTruck();
    }

    public function createBus(): Bus {
        return new UkrainianBus();
    }
}

class ForeignVehicleFactory implements VehicleFactory {
    public function createCar(): Car {
        return new ForeignCar();
    }

    public function createTruck(): Truck {
        return new ForeignTruck();
    }

    public function createBus(): Bus {
        return new ForeignBus();
    }
}

function demoFactory(VehicleFactory $factory) {
    // Створення автомобілів
    $cars = [];
    for ($i = 0; $i < 2; $i++) {
        $cars[] = $factory->createCar();
    }

    // Створення вантажівок
    $trucks = [];
    for ($i = 0; $i < 2; $i++) {
        $trucks[] = $factory->createTruck();
    }

    // Створення автобусів
    $buses = [];
    for ($i = 0; $i < 2; $i++) {
        $buses[] = $factory->createBus();
    }

    // Виведення інформації про парк автомобілів
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

// Демонстрація вітчизняної фабрики
echo "Using Ukrainian Vehicle Factory:\n";
demoFactory(new UAVehicleFactory());
echo "\n";

// Демонстрація зарубіжної фабрики
echo "Using Foreign Vehicle Factory:\n";
demoFactory(new ForeignVehicleFactory());
?>