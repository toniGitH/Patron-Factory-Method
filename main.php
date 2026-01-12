<?php

    require_once 'EnvioPorCamion.php';
    require_once 'EnvioPorBarco.php';
    require_once 'EnvioPorAvion.php';

    // En un punto de la aplicación se genera una compra y el cliente marca el envío por camión
    echo "RECIBIDO UN PEDIDO CON SOLICITUD DE ENVIO POR CAMIÓN\n";
    $envio_pedido = new EnvioPorCamion();
    $resultado_envio = $envio_pedido->procesarEnvio();
    echo $resultado_envio;

    echo "\n----------------------------\n";

    // En otro punto de la aplicación se genera una compra y el cliente marca el envío por barco
    echo "RECIBIDO UN PEDIDO CON SOLICITUD DE ENVIO POR BARCO\n";
    $envio_pedido = new EnvioPorBarco();
    $resultado_envio = $envio_pedido->procesarEnvio();
    echo $resultado_envio;

 echo "\n----------------------------\n";

    // En otro punto de la aplicación se genera una compra y el cliente marca el envío por avión
    echo "RECIBIDO UN PEDIDO CON SOLICITUD DE ENVIO POR AVIÓN\n";
    $envio_pedido = new EnvioPorAvion();
    $resultado_envio = $envio_pedido->procesarEnvio();
    echo $resultado_envio;
