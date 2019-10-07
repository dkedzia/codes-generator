<?php
include 'Generate.class.php';
include 'Controller.class.php';
include 'View.class.php';
include 'FileOperator.class.php';
include 'ControllerInput.class.php';


$cli = (isset($argv)) ? true : false;

$controllerInput = new ControllerInput();

switch($cli){
    case true:
        $controller = new Controller($argv);
    break;
    case false:
        $controllerInput = new ControllerInput();
        (isset($_GET['length'])) ? $controllerInput->addArg('--length', $_GET['length']) : false;
        (isset($_GET['amount'])) ? $controllerInput->addArg('--amount', $_GET['amount']) : false;
        $controller = new Controller($controllerInput->argArray, true);
    break;
}

//$controller = new Controller($controllerInput->inputType($cli), $argv);


    //echo php_sapi_name();