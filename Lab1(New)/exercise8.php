<?php 

class CsvFile{
    private $_csv_file = null;

    public function __construct($csv_file)
    {
        if(file_exists($csv_file)){
            $this->_csv_file = $csv_file;
        } else throw new Exception("File not found");
    }

    public function SetCsv(Array $csv){
        $file_handle = fopen($this->_csv_file, "a");
        foreach($csv as $value){
            fputcsv($file_handle, explode(";", $value), ";");
        }
        fclose($file_handle);
    }

    public function GetCsv(){
        $file_handle = fopen($this->_csv_file, "r");
        $array_line = array();
        while(($line = fgetcsv($file_handle, 0, ";")) !== FALSE){
            $array_line[] = $line;
        }
        fclose($file_handle);
        return $array_line;
    }
}

try{
    $csv = new CsvFile("Exercise8.csv");
    $get_csv = $csv->GetCsv();
    foreach($get_csv as $value){
        echo "Number: " . $value[0] . "<br>";
        echo "Purpose: " . $value[1] . "<br>";
        echo "Media: " . $value[2] . "<br>";
        echo "Year of creation: " . $value[3] . "<br>";
        echo "------------" . "<br>";
    }

    $arr = array("20;Service;Cloud;2022");
    $csv->SetCsv($arr);

} catch (Exception $e){
    echo "Помилка: " . $e->getMessage();
}


?>