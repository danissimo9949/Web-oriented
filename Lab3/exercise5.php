<?php

interface ILoger{
    public function log($message);
}

class DBLoger implements ILoger{

    private $logFile;

    public function __construct($filename, $mode = 'a')
    {
        $this->logFile = fopen($filename, $mode) or die("Could'nt open file");
    }

    public function log($message){

        $message = date("F j, Y, g:i a") . ': ' . $message . "\n"; 

        fwrite($this->logFile,$message);
    }

    public function __destruct()
    {
        if($this->logFile){ fclose($this->logFile); }
    }
}

$DbLog= new DBLoger('log.csv','a'); 

$DbLog ->log('First commit'); 

$DbLog ->log('Next commit (second)'); 

?>