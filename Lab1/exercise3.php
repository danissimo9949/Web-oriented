<?php

class Document{
    // Приватне поле класу
    private $number;
    public $purpose;
    public $media;
    public $yearOfCreation;

    public function GetPurpose(){
        return $this->purpose;
    }

    public function GetMedia(){
        return $this->media;
    }

    public function GetYear(){
        return $this->yearOfCreation;
    }

    public function SetPurpose($purpose){
        $this->purpose=$purpose;
    }

    public function SetMedia($media){
        $this->media=$media;
    }

    public function SetYear($yearOfCreation){
        $this->yearOfCreation=$yearOfCreation;
    }

    public function ShowPurpose(){
        echo $this->purpose;
    }

    public function ShowMedia(){
        echo $this->media;
    }

    public function ShowYear(){
        echo $this->yearOfCreation;
    }

    // Приватний метод класу
    private function GetNumber(){
        return $this->number;
    }

    public function SearchYear($requestYear){
        if(is_numeric($requestYear)){
            if($this->yearOfCreation == $requestYear){
                return $this->purpose;
            }
        }
    }

    public function GetNumberFromName($purpose, $year){
        if ($this->purpose == $purpose && $this->yearOfCreation == $year){
            // зверненя до приватного методу класу
            return $this->GetNumber();
        }
    }

    public function show_objects($documentArray){
        foreach($documentArray as $doc){
            echo "Purpose: {$doc->purpose} | Media: {$doc->media} | Year of creation: {$doc->yearOfCreation}";
            echo "<br>";
        }
    }
}

$document = new Document();
$document->SetPurpose("Service");
$document->SetMedia("Flash");
$document->SetYear(2024);
$document1 = new Document();
$document1->SetPurpose("Service");
$document1->SetMedia("Disk");
$document1->SetYear(2023);
$document2 = new Document();
$document2->SetPurpose("Public document");
$document2->SetMedia("Digital");
$document2->SetYear(2020);

// Створення 3 екземплярів та робота з ними
/*$document->ShowPurpose();
echo "<br>";
$document->ShowMedia();
echo "<br>";
$document->ShowYear();
echo "<br>";
$document1->ShowPurpose();
echo "<br>";
$document1->ShowMedia();
echo "<br>";
$document1->ShowYear();
echo "<br>";
$document2->ShowPurpose();
echo "<br>";
$document2->ShowMedia();
echo "<br>";
$document2->ShowYear();
echo "<br>";

$purposeOfDocument = $document->SearchYear(2024);
echo $purposeOfDocument;*/

// Неможливо зчитати приватне поле класу
//echo $document->number;

// Створимо ще 2 екземпляри та масив з 5 документів
$document3 = new Document();
$document3->SetPurpose("Service");
$document3->SetMedia("Flash");
$document3->SetYear(2024);
$document4 = new Document();
$document4->SetPurpose("Public document");
$document4->SetMedia("Digital");
$document4->SetYear(2025);

$documentArray = array();
$documentArray[0] = $document;
$documentArray[1] = $document1;
$documentArray[2] = $document2;
$documentArray[3] = $document3;
$documentArray[4] = $document4;
$document->show_objects($documentArray);

?>