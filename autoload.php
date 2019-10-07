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
        if(isset($_GET['length']) && isset($_GET['amount'])){
            $controllerInput->addArg('--length', $_GET['length']);
            $controllerInput->addArg('--amount', $_GET['amount']);
            $controller = new Controller($controllerInput->argArray, true);
        } else {
            header("Location: form.html");
        }
        
    break;
}