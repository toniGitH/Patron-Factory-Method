<?php

require_once 'Vehiculo.php';

/**
 * Clase Camion - Vehículo concreto
 */
class Camion implements Vehiculo {

    public function probarVehiculo(): string {

        return "El camión funciona correctamente ...";
        
    }
    
}