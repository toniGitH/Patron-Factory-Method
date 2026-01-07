<?php

    require_once "CreadorConcretoA.php";
    require_once "CreadorConcretoB.php";

    // Crear instancias de los creadores
    $creatorA = new CreadorConcretoA();
    $creatorB = new CreadorConcretoB();

    // Obtener los resultados de cada producto
    $resultA = $creatorA->crearProducto();
    $resultB = $creatorB->crearProducto();
    
?>