<?php

abstract class Document{

    protected string $documentName;
    protected string $documentNumber;
    protected string $documentPurpose;

    public function __construct(string $name, string $number, string $purpose) {
        $this->documentName = $name;
        $this->documentNumber = $number;
        $this->documentPurpose = $purpose;
    }
    
    abstract public function showPurpose();

}

class SecretDocument extends Document{

    public function __construct(string $name, string $number, string $purpose)
    {
       parent::__construct($name, $number, $purpose);
    }

    public function showPurpose()
    {
        echo "This is a secret document. Purpose: {$this->documentPurpose}.";
    }
}

class PublicDocument extends Document{

    public function __construct(string $name, string $number, string $purpose)
    {
       parent::__construct($name, $number, $purpose);
    }

    public function showPurpose()
    {
        echo "This is a public document. Purpose: {$this->documentPurpose}.";
    }
}

$secDoc = new SecretDocument("#994SECRET", "#20", 'Secret');
echo "{$secDoc->showPurpose()}<br>";
$pubDoc = new SecretDocument("#9942425", "#404", 'Public document');
echo "{$pubDoc->showPurpose()}<br>";
?>