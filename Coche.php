<?php

require_once 'Vehiculo.php';

/**
 * Clase Coche - Vehículo concreto
 */
class Coche extends Vehiculo {

    protected string $tipoVehiculo = "Coche";

    // Constructor heredado de Vehiculo

    public function probarVehiculo(): string {

        return "El $this->tipoVehiculo $this->marcaVehiculo de color $this->colorVehiculo funciona correctamente ...";
        
    }
    
}