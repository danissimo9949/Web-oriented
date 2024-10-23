<?php

interface DocumentFactory {
    public function create($purpose, $media, $yearOfCreation);
}

interface IDocument {
    public function getPurpose();
    public function getMedia();
    public function getYear();
}

class Document implements IDocument {
    public $purpose;
    public $media;
    public $yearOfCreation;

    public function getPurpose() {
        return $this->purpose;
    }

    public function getMedia() {
        return $this->media;
    }

    public function getYear() {
        return $this->yearOfCreation;
    }

    public function setPurpose($purpose) {
        $this->purpose = $purpose;
    }

    public function setMedia($media) {
        $this->media = $media;
    }

    public function setYear($yearOfCreation) {
        $this->yearOfCreation = $yearOfCreation;
    }

    public function showInfo() {
        echo "Purpose: {$this->purpose}, Media: {$this->media}, Year: {$this->yearOfCreation}<br>";
    }

}

class ServiceDocumentFactory implements DocumentFactory {
    public function create($purpose, $media, $yearOfCreation) {
        $document = new Document();
        $document->setPurpose($purpose);
        $document->setMedia($media);
        $document->setYear($yearOfCreation);
        return $document;
    }
}

class PublicDocumentFactory implements DocumentFactory {
    public function create($purpose, $media, $yearOfCreation) {
        $document = new Document();
        $document->setPurpose($purpose);
        $document->setMedia($media);
        $document->setYear($yearOfCreation);
        return $document;
    }
}

$serviceFactory = new ServiceDocumentFactory();
$publicFactory = new PublicDocumentFactory();

$doc1 = $serviceFactory->create("Service", "Flash", 2024);
$doc2 = $publicFactory->create("Public document", "Digital", 2020);

$doc1->showInfo();
$doc2->showInfo();
