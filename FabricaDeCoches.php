<?php

require_once 'FabricaDeVehiculos.php';
require_once 'Coche.php';

/**
 * Clase FabricaDeCoches - Fábrica concreta
 * Solo implementa el método fabricarVehiculo() para crear y devolver una instancia de Coche
 */
class FabricaDeCoches extends FabricaDeVehiculos {
    
    protected function fabricarVehiculo(): Vehiculo {

        return new Coche();
        
    }

}