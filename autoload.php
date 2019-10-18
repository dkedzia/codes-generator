<?php
function __autoload($className)
{
   require('./'.$className.'.php');
}

$cli = (isset($argv)) ? true : false;

$inputController = new InputController();

switch($cli)
{
    case true:  // If CLI
        $controller = new MainController($argv);
        break;  // End of true case
    case false: // If WEB
        $inputController = new InputController();
        if (isset($_GET['length']) && isset($_GET['amount'])) {
            $inputController->addArg('--length', $_GET['length']);
            $inputController->addArg('--amount', $_GET['amount']);
            $controller = new MainController($inputController->argArray, true);
        } else {    // If not enough args
            header("Location: form.html");  // Redirect to html form
        }
        break;  // End of false case
}   // End of switch $cli