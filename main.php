<?php

    require_once 'GestorDeEnvios.php';
    require_once 'EnvioPorCamion.php';
    require_once 'EnvioPorBarco.php';
    require_once 'EnvioPorAvion.php';

// 1. GESTION DE LOS ENVÍOS: RECEPCIÓN DE SOLICITUDES Y GESTIÓN DE LOS ENVÍOS 

    // SOLICITUD 1: solicitud múltiple (el Gestor de Envíos puede procesar varios envíos simultáneamente)

    // Definir los pedidos que se van a procesar
    $pedidos = [
        [
            'identificación_del_pedido' => 'PEDIDO CON SOLICITUD DE ENVIO POR CAMIÓN',
            'descripcion_del_pedido' => 'Cliente solicita envío por camión (solicitud múltiple).',
            'envio' => new EnvioPorCamion()
        ],
        [
            'identificación_del_pedido' => 'PEDIDO CON SOLICITUD DE ENVIO POR BARCO',
            'descripcion_del_pedido' => 'Cliente solicita envío por barco (solicitud múltiple).',
            'envio' => new EnvioPorBarco()
        ],
        [
            'identificación_del_pedido' => 'PEDIDO CON SOLICITUD DE ENVIO POR AVIÓN',
            'descripcion_del_pedido' => 'Cliente solicita envío por avión (solicitud múltiple).',
            'envio' => new EnvioPorAvion()
        ]
    ];

    // Crear una instancia del gestor de envíos
    $gestor = new GestorDeEnvios();

    // Extraer solo las instancias de Envio para pasarlas al gestor
    $envios = array_map(function($pedido) {
        return $pedido['envio'];
    }, $pedidos);

    // El gestor procesa todos los envíos sin conocer los medios de transporte concretos
    $salidas = $gestor->procesarMultiplesPedidos($envios);

    // SOLICITUD 2: el Gestor de Envíos procesa un envío individual

    // Definir el pedido individual
    $pedido_individual = [
        'identificación_del_pedido' => 'PEDIDO CON SOLICITUD DE ENVIO POR CAMIÓN',
        'descripcion_del_pedido' => 'Cliente solicita envío por camión (solicitud individual).',
        'envio' => new EnvioPorCamion()
    ];

    // El gestor procesa el envío individual sin conocer el medio de transporte concreto
    $salida_individual = $gestor->procesarPedido($pedido_individual['envio']);

// 2. REPRESENTACIÓN DE RESULTADOS

    // Construir el array de resultados combinando la información de los pedidos con las salidas
    $resultados = [];
    foreach ($pedidos as $index => $pedido) {
        $resultados[] = [
            'identificación_del_pedido' => $pedido['identificación_del_pedido'],
            'descripcion_del_pedido' => $pedido['descripcion_del_pedido'],
            'salida' => $salidas[$index]
        ];
    }

    // Añadir el pedido individual a los resultados
    $resultados[] = [
        'identificación_del_pedido' => $pedido_individual['identificación_del_pedido'],
        'descripcion_del_pedido' => $pedido_individual['descripcion_del_pedido'],
        'salida' => $salida_individual
    ];

// 3. VENTAJAS DEL PATRÓN FACTORY METHOD

    $ventajas = [
        'Desacoplamiento: El código cliente no necesita conocer las clases concretas.',
        'Extensibilidad: Es fácil añadir nuevos tipos de envío sin modificar el código existente.',
        'Responsabilidad única: La creación de objetos se delega a subclases específicas.'
    ];

// ------------------------------------------------------------------------------------------------------

// Si el archivo se ejecuta directamente (CLI) y no es un include
if (php_sapi_name() === 'cli' && count(debug_backtrace()) === 0) {
    echo "========================================\n";
    echo "EJEMPLO SIMPLE DEL PATRÓN FACTORY METHOD\n";
    echo "========================================\n\n";

    foreach ($resultados as $resultado) {
        echo $resultado['identificación_del_pedido'] . "\n";
        echo $resultado['descripcion_del_pedido'] . "\n";
        echo str_repeat("-", 40) . "\n";
        echo $resultado['salida'];
        echo "\n\n";
    }

    echo "===================================\n";
    echo "VENTAJAS DEL PATRÓN FACTORY METHOD:\n";
    echo "===================================\n";
    foreach ($ventajas as $ventaja) {
        echo "✓ " . $ventaja . "\n";
    }
    echo "\n";
}
