<?php

class Document{
    // Приватне поле класу
    private $number;
    public $purpose;
    public $media;
    public $yearOfCreation;

    public function __construct()
    {
        
    }

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

class DocumentFactory {
    public static function create($purpose, $media, $yearOfCreation): Document {
        $document = new Document();
        $document->SetPurpose($purpose);
        $document->SetMedia($media);
        $document->SetYear($yearOfCreation);
        return $document;
    }
}

$doc1 = DocumentFactory::create("Research Paper", "PDF", 2021);
$doc2 = DocumentFactory::create("Project Report", "Word", 2022);
$documents = [$doc1, $doc2];

$doc1->show_objects($documents);