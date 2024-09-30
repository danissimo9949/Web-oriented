<?php 

trait my_first_trait //train creating

{ 

public function traitFunction() 

{ 

echo "Hello world<br>"; 

}

public function Greet(){
    $currentHour = date("H");
    switch(true){
        case ($currentHour >= 5 && $currentHour < 12):
            return "Good morning!";
        case ($currentHour >= 12 && $currentHour < 18):
            return "Good day";
        case ($currentHour >= 18 && $currentHour < 22):
            return "Good evening";
        default:
            return "Good night!";
    }
        
}

} 

class helloWorld 

{ 

use my_first_trait;  //train using

} 

$objTest = new HelloWorld(); 
$objTest->traitFunction(); 
echo "{$objTest->Greet()}<br>";

?> 