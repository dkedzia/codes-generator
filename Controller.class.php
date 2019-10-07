<?php
class Controller{
    private $argsArray = array();

    public $length;
    public $amount;
    public $fileName;

    public $generate;
    public $view;
    public $fileOperator;

    function __construct($argsArray){
        $this->view = new View();
        $this->generate = new Generate();
        $this->fileOperator = new FileOperator();
        $this->argsArray = $argsArray;
        if($this->argsParse()){
            $maxLength = pow(62,$this->amount);
            if($this->length <= $maxLength){
                echo "MaxLength: $maxLength\n";
                $codesArray = $this->generate->execute();
            
                $this->view->printCodes($codesArray);
                if($this->fileName){
                    $this->fileOperator->fileName = $this->fileName;
                    $this->fileOperator->saveToFile($codesArray);
                    $this->view->savedToFile($this->fileName);
                }
            } else {
                $this->view->tooManyCodes($maxLength);
            }
        } 
    }

    public function argumentSearch($argToSearch){
        if(in_array($argToSearch, $this->argsArray)){
            $index=array_search($argToSearch,$this->argsArray);
            if(isset($this->argsArray[$index+1]) && !empty($this->argsArray[$index+1])){
                return $this->argsArray[$index+1];
            } else return false;
        } else return false;
    }

    public function argsParse(){
        if(in_array('--help', $this->argsArray)):
            $this->view->printHelp();
            return false;
        else:
            if($this->chooseArg('-l', '--length')):
                $this->length = $this->chooseArg('-l', '--length');
            else:
                $this->length = 10;
            endif;
            if($this->chooseArg('-a', '--amount')):
                $this->amount = $this->chooseArg('-a', '--amount');
            else:
                $this->amount = 1;
            endif;
            if($this->chooseArg('-f', '--file')):
                $this->fileName = $this->chooseArg('-f', '--file');
            endif;
            if(is_numeric($this->length) && is_numeric($this->amount)):
                $this->generate->length = $this->length;
                $this->generate->amount = $this->amount;
                echo "Amout: $this->amount\n";
                return true;
            else:
                return false;   
            endif;
        endif;
    }

    private function chooseArg($arg1, $arg2){
        if($this->argumentSearch($arg1)){
            return $this->argumentSearch($arg1);
        } else if ($this->argumentSearch($arg2)){
            return $this->argumentSearch($arg2);
        } else return false;
    }
};