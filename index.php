<?php
    
require_once "CreadorConcretoA.php";
require_once "CreadorConcretoB.php";

// Usando CreadorConcretoA
$creadorA = new CreadorConcretoA();
echo $creadorA->crearProducto() . PHP_EOL;

// Usando CreadorConcretoB
$creadorB = new CreadorConcretoB();
echo $creadorB->crearProducto() . PHP_EOL;
