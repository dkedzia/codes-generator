<?php
class ControllerInput{
    public $argArray = array();
    public function addArg($type, $content){
        array_push($this->argArray, $type, $content);
    }   // End of addArg()
};