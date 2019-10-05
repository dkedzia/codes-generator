<?php
//parse_str(implode('&', array_slice($argv, 1)), $_GET);
$resultString = '';
$charactersBase = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
for ($i = 0; $i < 10; $i++){ 
    $index = rand(0, strlen($charactersBase) - 1); 
    $resultString .= $charactersBase[$index]; 
} 
echo $resultString;