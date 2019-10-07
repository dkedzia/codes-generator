<?php
class Controller{
    public $length;
    public $amount;
    public $fileName = 'codes.txt';

    private $argsArray = array();

    private $generate;
    private $view;
    private $fileOperator;

    function __construct($argsArray, $web = false){
        $this->view = new View();
        $this->generate = new Generate();
        $this->fileOperator = new FileOperator();
        $this->argsArray = $argsArray;
        if($this->argsParse()){
            $maxAmount = pow(strlen($this->generate->charactersBase), $this->length);
            if($this->amount <= $maxAmount){
                $codesArray = $this->generate->execute();

                (!$web) ? $this->view->printCodes($codesArray) : false;

                if($this->fileName){
                    $this->fileOperator->fileName = $this->fileName;
                    $this->fileOperator->saveToFile($codesArray);

                    (!$web) ? $this->view->savedToFile($this->fileName) : false;

                    ($web) ? $this->fileOperator->makeDownload() : false;
                }
            } else {
                $this->view->tooManyCodes($maxAmount);
            }
        }
    }   // End of contructor

    public function argumentSearch($argToSearch){
        if(in_array($argToSearch, $this->argsArray)){

            $index=array_search($argToSearch,$this->argsArray);

            if(isset($this->argsArray[$index+1]) && !empty($this->argsArray[$index+1])){
                return $this->argsArray[$index+1];
            } else return false;
            
        } else return false;
    }   // End of argumentSearch()

    public function argsParse(){
        if(in_array('--help', $this->argsArray) || in_array('-h', $this->argsArray)):
            $this->view->printHelp();
            return false;
        else:
            ($this->chooseArg('-l', '--length')) ? $this->length = $this->chooseArg('-l', '--length') : $this->length = 10;
            ($this->chooseArg('-a', '--amount')) ? $this->amount = $this->chooseArg('-a', '--amount') : $this->amount = 1;
            ($this->chooseArg('-f', '--file')) ? $this->fileName = $this->chooseArg('-f', '--file') : false;
            
            if(is_numeric($this->length) && is_numeric($this->amount)):
                $this->generate->length = $this->length;
                $this->generate->amount = $this->amount;
                return true;
            else:
                return false;   
            endif;
        endif;
    }   // End of argsParse()

    private function chooseArg($arg1, $arg2){
        if($this->argumentSearch($arg1)){
            return $this->argumentSearch($arg1);
        } else if ($this->argumentSearch($arg2)){
            return $this->argumentSearch($arg2);
        } else return false;
    }   // End of chooseArg()
};