<?php

require_once 'FabricaDeVehiculos.php';
require_once 'Moto.php';

/**
 * Clase FabricaDeMotos - Fábrica concreta
 * Solo implementa el método crear() para devolver una Moto
 */
class FabricaDeMotos extends FabricaDeVehiculos {
    
    protected function crear(): Vehiculo {
        return new Moto();
    }
    
}