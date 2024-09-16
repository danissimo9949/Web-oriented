<?php
header("Content-Type: text/html; charset=utf-8");

class TextFile{
    public $buff;
    public $filename;

    function __construct($filename)
    {
        $uploaddir = './';
        $this->filename = $uploaddir . $filename;
        if(!file_exists($this->filename)){
            exit("File does'nt exist!");
        }
        $fd = fopen($filename, "r");
        if(!$fd) exit("File open error!");
        $this->buff = fread($fd, filesize($this->filename));
        fclose($fd);
    }

    function GetContent(){
        return $this->buff;
    }

    function RemoveStringByNumber($number){
        if(!empty($this->filename)){
            $strings = file($this->filename);
            if(count($strings) < $number){
                echo "String with this number doesn't exist <br>";
                echo "Count of strings -> " . count($strings);
            }
            unset($strings[$number - 1]);
            $strings = array_values($strings);
            $this->buff = implode(PHP_EOL, $strings);
            echo "The string was succesful deleted";
            echo "<br>";
        } else {
            return 0;
        }
    }
}

$file = new TextFile("exercise6.txt");
echo "{$file->GetContent()}";
echo "<br>";
$file->RemoveStringByNumber(4);
echo "New content without removed string -> " . "{$file->GetContent()}";
echo "<br>";
?>