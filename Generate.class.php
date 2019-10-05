<?php
class Generate{
    private $lenght;
    private $amout;

    private $codesArray = array();

    public $charactersBase = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    function __construct($lenght, $amout){
        $this->length = $lenght;
        $this->amount = $amout;
    }

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

parse_str(implode('&', array_slice($argv, 1)), $_GET);
$generate = new Generate($_GET['length'], $_GET['amount']);
$generate->execute();