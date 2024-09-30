<?php

interface IShowable{
    public function showDetails();
}

interface IPrintPurpose{
    public function showPurpose();
}

trait DocumentTrait{
    public function showDetails(){
        echo "Document Name: {$this->documentName}, Document Number: {$this->documentNumber}<br>";
    }

    public function showPurpose(){
        echo "This is a document. Purpose: {$this->documentPurpose}.";
    }
}

abstract class Document{

    protected string $documentName;
    protected string $documentNumber;
    protected string $documentPurpose;

    public function __construct(string $name, string $number, string $purpose) {
        $this->documentName = $name;
        $this->documentNumber = $number;
        $this->documentPurpose = $purpose;
    }
    
}

class SecretDocument extends Document implements IShowable, IPrintPurpose{
    use DocumentTrait;

    public function __construct(string $name, string $number, string $purpose)
    {
       parent::__construct($name, $number, $purpose);
    }

}

class PublicDocument extends Document implements IShowable, IPrintPurpose{
    use DocumentTrait;

    public function __construct(string $name, string $number, string $purpose)
    {
       parent::__construct($name, $number, $purpose);
    }

}

$secDoc = new SecretDocument("#994SECRET", "#20", 'Secret');
echo "{$secDoc->showDetails()}<br>";
echo "{$secDoc->showPurpose()}<br>";
$pubDoc = new PublicDocument("#9942425", "#404", 'Public document');
echo "{$pubDoc->showDetails()}<br>";
echo "{$pubDoc->showPurpose()}<br>";
?>