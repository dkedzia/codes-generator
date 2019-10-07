<?php
class FileOperator{
    public $fileName;

    public function saveToFile($content){
        $file = fopen($this->fileName, "w");
        if($file){
            for($i = 0; $i < sizeof($content); $i++){
                fwrite($file, $content[$i]);
                fwrite($file,"\n");
            }
            fclose($file);
            return true;
        } else return false;
        
    }
    public function makeDownload(){
        header('Content-Type: application/download');
        header('Content-Disposition: attachment; filename="codes.txt"');
        header("Content-Length: " . filesize("codes.txt"));

        $f = fopen("codes.txt", "r");
        fpassthru($f);
        fclose($f);
    }
};