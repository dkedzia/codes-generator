<?php
class Generate
{
    public $charactersBase = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    private $codesArray = array();

    public function execute()
    {
        for ($i = 0; $i < $this->amount; $i++) {
            do {
                $code = '';
                $unique = false;
                
                $code = $this->generateOneCode();
            } while (!$this->isItUnique($code));
            array_push($this->codesArray, $code);
        }
        return $this->codesArray;
    }   // End of execute();

    private function generateOneCode()
    {
        $resultString = '';
        for ($i = 0; $i < $this->length; $i++) { 
            $index = rand(0, strlen($this->charactersBase) - 1); 
            $resultString .= $this->charactersBase[$index]; 
        } 
        return $resultString;
    }   // End of generateOneCode()

    private function isItUnique($code)
    {
        return !in_array($code, $this->codesArray);
    }   // End of isItUnique();

    
};

