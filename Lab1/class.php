<?php

class Coor{
    private string $name;
    public string $login;
    private string $password;

    function __construct($name, $login, $password)
    {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
    }

    public function Getname(){
        return $this->name;
    }

    public function Getlogin(){
        return $this->login;
    }

    // Автоматичне видалення об'єкту без посилань
    function __destruct()
    {
        echo "Destroying " . $this->name . "/n";
    }
}

// Демонстрація видалення екземпляру класу
/*$user1 = new Coor("Nick", "login", "password");
echo $user1->Getname();
echo "<br>";
// Видалення об'єкту ансетом
unset($user1);
if(!isset($user1)){
    echo "Object succesful deleted";
    echo "<br>";
}*/


$user1 = new Coor("Nick", "login", "password");
$user2 = new Coor("Daniel", "daniil2002", "dan2002");
$user3 = new Coor("Sasha", "resolutionS", "res228337");

echo "Name -> " . $user1->Getname();
echo "<br>";
echo "Login -> " . $user1->Getlogin();
echo "<br>";
echo "Password -> " . "secret";
echo "<br>";
echo "Name -> " . $user2->Getname();
echo "<br>";
echo "Login -> " . $user2->Getlogin();
echo "<br>";
echo "Password -> " . "secret";
echo "<br>";
echo "Name -> " . $user2->Getname();
echo "<br>";
echo "Login -> " . $user2->Getlogin();
echo "<br>";
echo "Password -> " . "secret";
echo "<br>";


?>