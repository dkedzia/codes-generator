<?php
class Generate{
    private $lenght;
    private $amout;

    private $codesArray = array();

    public $charactersBase = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    public function generateOneCode(){
        $resultString = '';
        for ($i = 0; $i < $this->length; $i++){ 
            $index = rand(0, strlen($this->charactersBase) - 1); 
            $resultString .= $this->charactersBase[$index]; 
        } 
        return $resultString;
    }

    private function isItUnique($code){
        return in_array($code, $this->codesArray);
    }

    public function execute(){
        for($i = 0; $i < $this->amount; $i++){
            $code = '';
            $unique = false;
            
            $code = $this->generateOneCode();
            $unique = $this->isItUnique($code);

            array_push($this->codesArray, $code);
        }
        print_r($this->codesArray);
    }
};

