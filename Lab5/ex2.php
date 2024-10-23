<?php

trait SingletonTrait {
    private static ?self $instance = null;

    private function __construct() {
        echo "Об'єкт створено!\n";
    }

    private function __clone() {}

    public function __wakeup() {
        throw new Exception("Cannot unserialize a singleton.");
    }

    public static function getInstance(): self {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}

class SomeClass {
    use SingletonTrait;

}

// Тест роботи Singleton

$instance1 = SomeClass::getInstance();
$instance2 = SomeClass::getInstance();

if ($instance1 === $instance2) {
    echo "Це один і той самий екземпляр об'єкта.\n";
}
?>