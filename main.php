<?php

require_once 'FabricaDeCoches.php';
require_once 'FabricaDeMotos.php';
require_once 'FabricaDeCamiones.php';

$fabricaDeCoches = new FabricaDeCoches();
$coche1 =$fabricaDeCoches->fabricarVehiculo();
$coche1->probarVehiculo();

$fabricaDeMotos = new FabricaDeMotos();
$moto1 = $fabricaDeMotos->fabricarVehiculo();
$moto1->probarVehiculo();

$fabricaDeCamiones = new FabricaDeCamiones();
$camion1 = $fabricaDeCamiones->fabricarVehiculo();
$camion1->probarVehiculo();

