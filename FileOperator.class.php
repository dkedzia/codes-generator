<?php
class FileOperator{
    public $fileName;

    public function saveToFile($content){
        $file = fopen($this->fileName, "w");
        if($file){
            for($i = 0; $i < sizeof($content); $i++){
                fwrite($file, $content[$i]);
            }
            fclose($file);
            return true;
        } else return false;
        
    }
};