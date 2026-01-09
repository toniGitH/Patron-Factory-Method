<?php

require_once 'FabricaDeVehiculos.php';
require_once 'Moto.php';

/**
 * Clase FabricaDeMotos - Fábrica concreta
 * Solo implementa el método fabricarVehiculo() para crear y devolver una instancia de Moto
 */
class FabricaDeMotos extends FabricaDeVehiculos {
    
    protected function fabricarVehiculo(): Vehiculo {

        return new Moto();
        
    }
    
}