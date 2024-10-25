<?php

interface DocumentInterface {
    public function getPurpose();
    public function getMedia();
    public function getYear();
    public function setPurpose($purpose);
    public function setMedia($media);
    public function setYear($year);
}

class DocumentAdapter implements DocumentInterface {
    private $document;

    public function __construct(Document $document) {
        $this->document = $document;
    }

    public function getPurpose() {
        return $this->document->GetPurpose();
    }

    public function getMedia() {
        return $this->document->GetMedia();
    }

    public function getYear() {
        return $this->document->GetYear();
    }

    public function setPurpose($purpose) {
        $this->document->SetPurpose($purpose);
    }

    public function setMedia($media) {
        $this->document->SetMedia($media);
    }

    public function setYear($year) {
        $this->document->SetYear($year);
    }
}

class Document {
    
    private $number;
    public $purpose;
    public $media;
    public $yearOfCreation;

    public function GetPurpose() {
        return $this->purpose;
    }

    public function GetMedia() {
        return $this->media;
    }

    public function GetYear() {
        return $this->yearOfCreation;
    }

    public function SetPurpose($purpose) {
        $this->purpose = $purpose;
    }

    public function SetMedia($media) {
        $this->media = $media;
    }

    public function SetYear($yearOfCreation) {
        $this->yearOfCreation = $yearOfCreation;
    }

    public function ShowPurpose() {
        echo $this->purpose;
    }

    public function ShowMedia() {
        echo $this->media;
    }

    public function ShowYear() {
        echo $this->yearOfCreation;
    }

    private function GetNumber() {
        return $this->number;
    }

    public function SearchYear($requestYear) {
        if (is_numeric($requestYear)) {
            if ($this->yearOfCreation == $requestYear) {
                return $this->purpose;
            }
        }
    }

    public function GetNumberFromName($purpose, $year) {
        if ($this->purpose == $purpose && $this->yearOfCreation == $year) {
            
            return $this->GetNumber();
        }
    }

    public function show_objects($documentArray) {
        foreach ($documentArray as $doc) {
            echo "Purpose: {$doc->purpose} | Media: {$doc->media} | Year of creation: {$doc->yearOfCreation}";
            echo "<br>";
        }
    }
}

$document1 = new Document();
$document1->SetPurpose("Service");
$document1->SetMedia("Flash");
$document1->SetYear(2024);

$document2 = new Document();
$document2->SetPurpose("Service");
$document2->SetMedia("Disk");
$document2->SetYear(2023);

$document3 = new Document();
$document3->SetPurpose("Public document");
$document3->SetMedia("Digital");
$document3->SetYear(2020);

// Create adapters for documents
$adapter1 = new DocumentAdapter($document1);
$adapter2 = new DocumentAdapter($document2);
$adapter3 = new DocumentAdapter($document3);

// Use the adapters
$documents = [$adapter1, $adapter2, $adapter3];

foreach ($documents as $doc) {
    echo "Purpose: " . $doc->getPurpose() . " | Media: " . $doc->getMedia() . " | Year of creation: " . $doc->getYear();
    echo "<br>";
}

?>