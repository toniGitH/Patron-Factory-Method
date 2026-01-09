<?php

require_once 'Vehiculo.php';

/**
 * Clase Coche - Vehículo concreto
 */
class Coche implements Vehiculo {

    protected string $tipoVehiculo = "Coche";
    protected string $marcaVehiculo;
    protected string $colorVehiculo;

    public function __construct(string $marcaVehiculo, string $colorVehiculo) {
        $this->marcaVehiculo = $marcaVehiculo;
        $this->colorVehiculo = $colorVehiculo;
    }

    public function probarVehiculo(): string {

        return "El $this->tipoVehiculo $this->marcaVehiculo de color $this->colorVehiculo funciona correctamente ...";
        
    }
    
}