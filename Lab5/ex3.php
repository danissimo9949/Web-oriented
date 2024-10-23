<?php

class Db {
    private static ?Db $instance = null;
    public $db;

    private function __construct() {
        echo "<h1>Connecting with database</h1>";
        $this->db = new mysqli('localhost', 'root', '', 'test');

        if ($this->db->connect_error) {
            throw new Exception("Connection error: " . $this->db->connect_error);
        }

        $this->db->query("SET NAMES 'UTF8'");
    }

    public static function getInstance(): Db {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __clone() {}

    public function __wakeup() {
        throw new Exception("Cannot unserialize a singleton.");
    }

    public function get_data(): array {
        $query = "SELECT * FROM menu";
        $result = $this->db->query($query);
        $rows = [];

        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        return $rows;
    }
}

$db1 = Db::getInstance();
$db2 = Db::getInstance();

if ($db1 === $db2) {
    echo "<p>Це один і той самий екземпляр об'єкта.</p>";
}

$data = $db1->get_data();
echo "<pre>";
print_r($data);
echo "</pre>";

?>