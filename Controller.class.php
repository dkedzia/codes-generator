<?php
class Controller extends {
    private $argsArray = array();

    public $length;
    public $amount;

    public $generate;

    function __construct($argsArray, $generate){
        $this->argsArray = $argsArray;
        $this->generate = $generate;
        if($this->argsParse()) $this->generate->execute();
    }

    public function argumentSearch($argToSearch){
        if(in_array($argToSearch, $this->argsArray)){
            $index=array_search($argToSearch,$this->argsArray);
            return $this->argsArray[$index+1];
        } else return false;
    }

    public function argsParse(){
        if($this->argumentSearch('--length')){
            $this->length = $this->argumentSearch('--length');
        } else $this->length = 10;
        if($this->argumentSearch('--amount')){
            $this->amount = $this->argumentSearch('--amount');
        } else $this->amount = 1;
        
        print_r($this->argsArray);

        if(is_numeric($this->length) && is_numeric($this->amount)){
            $this->generate->length = $this->length;
            $this->generate->amount = $this->amount;
            return true;
        } else return false;   
    }
};