<?php

//var_dump($argv);

include 'Generate.class.php';
include 'Controller.class.php';

$controller = new Controller($argv, new Generate());