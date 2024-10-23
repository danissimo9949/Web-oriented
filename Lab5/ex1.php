<?php  class someClass { 

protected static $_instance;  


    private function __construct() {         

} 


public static function getInstance() {         if (self::$_instance === null) { 

        self::$_instance = new self;    

    } 



    return self::$_instance; 

} 



private function __clone() { 

} 


private function __wakeup() { 

}      

}

$ex1 = someClass::getInstance();
$ex2 = someClass::getInstance();
if ($ex1 === $ex2) {
    echo "Це один і той самий екземпляр об'єкта.\n";
} else {
    echo "Це різні екземпляри об'єктів.\n";
}

?>

