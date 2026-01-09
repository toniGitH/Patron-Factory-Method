<?php

require_once 'Concesionario.php';
require_once 'FabricaDeCoches.php';
require_once 'FabricaDeMotos.php';
require_once 'FabricaDeCamiones.php';

// ========================================
// 1. LÓGICA DE APLICACIÓN
// ========================================

// EJEMPLO 1: Procesar venta de coche
$concesionarioCoches = new Concesionario(new FabricaDeCoches("Seat", "azul"));
$ventaCoche = $concesionarioCoches->venderVehiculo();

// EJEMPLO 2: Procesar venta de moto
$concesionarioMotos = new Concesionario(new FabricaDeMotos("Yamaha", "rojo"));
$ventaMoto = $concesionarioMotos->venderVehiculo();

// EJEMPLO 3: Procesar venta de camión (con sintaxis alternativa)
$fabricaDeCamiones = new FabricaDeCamiones("Scania", "verde");
$concesionarioCamiones = new Concesionario($fabricaDeCamiones);
$ventaCamion = $concesionarioCamiones->venderVehiculo();


// ========================================
// 2. LÓGICA DE PRESENTACIÓN (Datos para la vista)
// ========================================
$resultados = [];

$resultados[] = [
    'titulo' => 'EJEMPLO 1: Concesionario de coches',
    'descripcion' => 'Se vende un coche Seat de color azul',
    'salida' => $ventaCoche
];

$resultados[] = [
    'titulo' => 'EJEMPLO 2: Concesionario de motos',
    'descripcion' => 'Se vende una moto Yamaha de color rojo',
    'salida' => $ventaMoto
];

$resultados[] = [
    'titulo' => 'EJEMPLO 3: Concesionario de camiones',
    'descripcion' => 'Se vende un camión Scania de color verde',
    'salida' => $ventaCamion
];

// Texto de ventajas
$ventajas = [
    "Solo tendría que crear 2 archivos nuevos: Autobus.php y FabricaDeAutobuses.php",
    "NO TENGO QUE CAMBIAR NADA EN LA CLASE Concesionario",
    "El método venderVehiculo() funciona para CUALQUIER vehículo",
    "NO necesito crear métodos venderCoche(), venderMoto(), venderCamion(), venderAutobus(), etc...",
    "El código de Concesionario está DESACOPLADO de los tipos concretos"
];

// Si el archivo se ejecuta directamente (CLI) y no es un include
if (count(debug_backtrace()) === 0) {
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
    echo "Supongamos que mañana quiero empezar a vender también autobuses\n";
    foreach ($ventajas as $ventaja) {
        echo "✓ " . $ventaja . "\n";
    }
}