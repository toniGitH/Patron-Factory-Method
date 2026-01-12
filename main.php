<?php

require_once 'EnvioPorCamion.php';
require_once 'EnvioPorBarco.php';
require_once 'EnvioPorAvion.php';

$resultados = [];

// En un punto de la aplicación se genera una compra y el cliente marca el envío por camión
$envio_pedido = new EnvioPorCamion();
$resultados[] = [
    'titulo' => 'RECIBIDO UN PEDIDO CON SOLICITUD DE ENVIO POR CAMIÓN',
    'descripcion' => 'Cliente solicita envío estándar por carretera.',
    'salida' => $envio_pedido->procesarEnvio()
];

// En otro punto de la aplicación se genera una compra y el cliente marca el envío por barco
$envio_pedido = new EnvioPorBarco();
$resultados[] = [
    'titulo' => 'RECIBIDO UN PEDIDO CON SOLICITUD DE ENVIO POR BARCO',
    'descripcion' => 'Cliente solicita envío marítimo.',
    'salida' => $envio_pedido->procesarEnvio()
];

// En otro punto de la aplicación se genera una compra y el cliente marca el envío por avión
$envio_pedido = new EnvioPorAvion();
$resultados[] = [
    'titulo' => 'RECIBIDO UN PEDIDO CON SOLICITUD DE ENVIO POR AVIÓN',
    'descripcion' => 'Cliente solicita envío urgente por aire.',
    'salida' => $envio_pedido->procesarEnvio()
];

$ventajas = [
    'Desacoplamiento: El código cliente no necesita conocer las clases concretas.',
    'Extensibilidad: Es fácil añadir nuevos tipos de envío sin modificar el código existente.',
    'Responsabilidad única: La creación de objetos se delega a subclases específicas.'
];

// Si el archivo se ejecuta directamente (CLI) y no es un include
if (php_sapi_name() === 'cli' && count(debug_backtrace()) === 0) {
    echo "========================================\n";
    echo "EJEMPLO SIMPLE DEL PATRÓN FACTORY METHOD\n";
    echo "========================================\n\n";

    foreach ($resultados as $resultado) {
        echo $resultado['titulo'] . "\n";
        echo $resultado['descripcion'] . "\n";
        echo str_repeat("-", 40) . "\n";
        echo $resultado['salida'];
        echo "\n\n";
    }

    echo "============================================\n";
    echo "QUÉ VENTAJA APORTA EL PATRÓN FACTORY METHOD:\n";
    echo "============================================\n";
    foreach ($ventajas as $ventaja) {
        echo "✓ " . $ventaja . "\n";
    }
    echo "\n";
}
