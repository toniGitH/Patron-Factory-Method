<?php

require_once 'FabricaDeVehiculos.php';
require_once 'Camion.php';

/**
 * Clase FabricaDeCamiones - Fábrica concreta
 * Solo implementa el método crear() para devolver un Camion
 */
class FabricaDeCamiones extends FabricaDeVehiculos {
    
    protected function crear(): Vehiculo {
        return new Camion();
    }
    
}