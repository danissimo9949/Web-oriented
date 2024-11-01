<?php

abstract class DocumentPrintHandler{
    protected $nextHandler;

    public function setNext(DocumentPrintHandler $nextHandler): DocumentPrintHandler
    {
        $this->nextHandler = $nextHandler;
        return $nextHandler;
    }

    abstract function checkPolicy($policy);
}

class SecretDocumentPrintHandler extends DocumentPrintHandler{

    private $name;
    function __construct($name)
    {
        $this->name = $name;
    }

    public function checkPolicy($policy)
    {
        if($policy == 'Secret'){
            echo "You have permissiom for print secret document with name {$this->name}<br>";
        } else if($this->nextHandler){
            $this->nextHandler->checkPolicy($policy);
        }
        else {
            echo "Access denied!<br>";
        }
    }
}

class PublicDocumentPrintHandler extends DocumentPrintHandler{

    private $name;
    function __construct($name)
    {
        $this->name = $name;
    }

    public function checkPolicy($policy)
    {
        if($policy == 'Public'){
            echo "You have permissiom for print public document with name {$this->name}<br>";
        } else if($this->nextHandler){
            $this->nextHandler->checkPolicy($policy);
        }
        else {
            echo "Access denied!<br>";
        }
    }
}

$secretHandler = new SecretDocumentPrintHandler("Secret Docs 2024");
$publicHandler = new PublicDocumentPrintHandler("Public document for 2022");

$secretHandler->setNext($publicHandler);

$userPolicy = "Public";
$secretHandler->checkPolicy($userPolicy);