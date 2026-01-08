<?php

require_once 'Vehiculo.php';

/**
 * Clase Coche - Vehículo concreto
 */
class Coche implements Vehiculo {
    
    public function probarVehiculo(): string {
        return "El coche funciona correctamente ...";
    }
    
}