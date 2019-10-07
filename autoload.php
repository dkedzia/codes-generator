<?php

include 'Controller.class.php';
include 'ControllerInput.class.php';

include 'Generate.class.php';
include 'FileOperator.class.php';

include 'View.class.php';

$cli = (isset($argv)) ? true : false;

$controllerInput = new ControllerInput();

switch($cli){
    case true:  // If CLI
        $controller = new Controller($argv);
    break;  // End of true case
    case false: // If WEB
        $controllerInput = new ControllerInput();
        if(isset($_GET['length']) && isset($_GET['amount'])){
            $controllerInput->addArg('--length', $_GET['length']);
            $controllerInput->addArg('--amount', $_GET['amount']);
            $controller = new Controller($controllerInput->argArray, true);
        } else {    // If not enough args
            header("Location: form.html");  // Redirect to html form
        }
    break;  // End of false case
}   // End of switch $cli