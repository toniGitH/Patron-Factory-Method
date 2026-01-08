<?php

require_once 'FabricaDeVehiculos.php';
require_once 'Coche.php';

/**
 * Clase FabricaDeCoches - Fábrica concreta
 * Solo implementa el método crear() para devolver un Coche
 */
class FabricaDeCoches extends FabricaDeVehiculos {
    
    protected function crear(): Vehiculo {
        return new Coche();
    }

}