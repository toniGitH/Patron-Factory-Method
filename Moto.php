<?php

require_once 'Vehiculo.php';

/**
 * Clase Moto - Vehículo concreto
 */
class Moto extends Vehiculo {

    protected string $tipoVehiculo = "Moto";

    // Constructor heredado de Vehiculo

    public function probarVehiculo(): string {

        return "La $this->tipoVehiculo $this->marcaVehiculo de color $this->colorVehiculo funciona correctamente ...";
        
    }
    
}