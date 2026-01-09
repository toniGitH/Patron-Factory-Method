<?php

require_once 'FabricaDeVehiculos.php';
require_once 'Camion.php';

/**
 * Clase FabricaDeCamiones - Fábrica concreta
 * Solo implementa el método fabricarVehiculo() para crear ydevolver una instancia de Camion
 */
class FabricaDeCamiones extends FabricaDeVehiculos {
    
    protected function fabricarVehiculo(): Vehiculo {

        return new Camion();
        
    }
    
}