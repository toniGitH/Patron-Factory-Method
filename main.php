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
$concesionarioCoches = new Concesionario(new FabricaDeCoches);
// La anterior sentencia equivale a estas otras dos:
//$fabricaDeCoches = new FabricaDeCoches();
//$concesionarioCoches = new Concesionario($fabricaDeCoches);
echo $concesionarioCoches->venderVehiculo();
echo "\n\n";

// ========================================
// EJEMPLO 2: Concesionario de motos
// ========================================
echo "EJEMPLO 2: Concesionario de motos\n";
echo str_repeat("-", 40) . "\n";
$concesionarioMotos = new Concesionario(new FabricaDeMotos());
echo $concesionarioMotos->venderVehiculo();
echo "\n\n";

// ========================================
// EJEMPLO 3: Concesionario de camiones
// ========================================
echo "EJEMPLO 3: Concesionario de camiones\n";
echo str_repeat("-", 40) . "\n";
$concesionarioCamiones = new Concesionario(new FabricaDeCamiones());
echo $concesionarioCamiones->venderVehiculo();
echo "\n\n";

echo "============================================\n";
echo "QUÉ VENTAJA APORTA EL PATRÓN FACTORY METHOD:\n";
echo "============================================\n";
echo "Supongamos que mañana quiero vender autobuses\n";
echo "✓ Solo tendría que crear 2 archivos nuevos:\n";
echo "  - Autobus.php\n";
echo "  - FabricaDeAutobuses.php\n";
echo "✓ NO TENGO QUE CAMBIAR NADA EN LA CLASE Concesionario\n";
echo "✓ El método venderVehiculo() funciona para CUALQUIER vehículo\n";
echo "✓ NO necesito crear métodos venderCoche(), venderMoto(), venderCamion(), venderAutobus(), etc...\n";
echo "✓ El código de Concesionario está DESACOPLADO de los tipos concretos\n";