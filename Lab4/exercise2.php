<?php

interface ILoger{
    public function log($message);
}

trait DatePicker {
    public function getCurrentDate() {
        return date("F j, Y, g:i a");
    }
}

trait FileWriter {
    private $logFile;

    public function __construct($filename, $mode = 'a') {
        $this->logFile = fopen($filename, $mode) or die("Couldn't open file");
    }

    public function writeToFile($message) {
        fwrite($this->logFile, $message);
    }

    public function __destruct() {
        if ($this->logFile) {
            fclose($this->logFile);
        }
    }
}

class DBLoger implements ILoger {
    use DatePicker, FileWriter;

    public function log($message){
        $dateTime = $this->getCurrentDate();
        $formattedMessage = "$dateTime: $message\n";
        $this->writeToFile($formattedMessage);
    }

}

$logger = new DBLoger('log.txt');
$logger->log('First message to log!');

?>