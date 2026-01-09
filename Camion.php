<?php

require_once 'Vehiculo.php';

/**
 * Clase Camion - Vehículo concreto
 */
class Camion extends Vehiculo {

    protected string $tipoVehiculo = "Camion";

    // Constructor heredado de Vehiculo

    public function probarVehiculo(): string {

        return "El $this->tipoVehiculo $this->marcaVehiculo de color $this->colorVehiculo funciona correctamente ...";
        
    }
    
}