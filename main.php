<?php

require_once 'Concesionario.php';
require_once 'FabricaDeCoches.php';
require_once 'FabricaDeMotos.php';
require_once 'FabricaDeCamiones.php';

echo "========================================\n";
echo "EJEMPLO SIMPLE DEL PATRÓN FACTORY METHOD\n";
echo "========================================\n\n";

// ========================================
// EJEMPLO 1: Concesionario de coches
// ========================================
echo "EJEMPLO 1: Concesionario de coches\n";
echo str_repeat("-", 40) . "\n";
$concesionarioCoches = new Concesionario(new FabricaDeCoches());
echo $concesionarioCoches->vender();
echo "\n\n";

// ========================================
// EJEMPLO 2: Concesionario de motos
// ========================================
echo "EJEMPLO 2: Concesionario de motos\n";
echo str_repeat("-", 40) . "\n";
$concesionarioMotos = new Concesionario(new FabricaDeMotos());
echo $concesionarioMotos->vender();
echo "\n\n";

// ========================================
// EJEMPLO 3: Concesionario de autobuses
// ¡FÍJATE! Esta clase NO EXISTÍA antes
// Solo he añadido Autobus.php y FabricaDeAutobuses.php
// NO he modificado Concesionario.php
// ========================================
echo "EJEMPLO 3: Concesionario de autobuses (NUEVO)\n";
echo str_repeat("-", 40) . "\n";
$concesionarioCamiones = new Concesionario(new FabricaDeCamiones());
echo $concesionarioCamiones->vender();
echo "\n\n";

// ========================================
// RESUMEN DE LA VENTAJA
// ========================================
echo "========================================\n";
echo "RESUMEN DE LA VENTAJA:\n";
echo "========================================\n";
echo "✓ La clase Concesionario NO CAMBIÓ\n";
echo "✓ Solo añadí 2 archivos nuevos:\n";
echo "  - Camion.php\n";
echo "  - FabricaDeCamiones.php\n";
echo "✓ El método vender() funciona para CUALQUIER vehículo\n";
echo "✓ NO necesito crear métodos venderCoche(), venderMoto(), venderAutobus()\n";
echo "✓ Si mañana quiero vender Camiones, solo añado 2 archivos más\n";
echo "✓ El código de Concesionario está DESACOPLADO de los tipos concretos\n";