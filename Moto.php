<?php

require_once 'Vehiculo.php';

/**
 * Clase Moto - Vehículo concreto
 */
class Moto implements Vehiculo {

    public function probarVehiculo(): string {
        return "La moto funciona correctamente ...";
    }
    
}