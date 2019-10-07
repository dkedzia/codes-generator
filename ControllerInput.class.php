<?php
class ControllerInput{
    public $argArray = array();
    function __contruct(){

    }
    public function addArg($type, $content){
        array_push($this->argArray, $type, $content);
    }
};