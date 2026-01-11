<?php

    require_once 'GestorDeEnviosPorCamion.php';
    require_once 'GestorDeEnviosPorBarco.php';

    // En un punto de la aplicación se genera una compra y el cliente marca el envío por camión
    echo "RECIBIDO UN PEDIDO CON SOLICITUD DE ENVIO POR CAMIÓN\n";
    $envio_pedido3467 = new GestorDeEnviosPorCamion();
    echo $envio_pedido3467->procesarEnvio();

    echo "\n----------------------------\n";

    // En otro punto de la aplicación se genera una compra y el cliente marca el envío por barco
    echo "RECIBIDO UN PEDIDO CON SOLICITUD DE ENVIO POR BARCO\n";
    $envio_pedido4821 = new GestorDeEnviosPorBarco();
    echo $envio_pedido4821->procesarEnvio();
