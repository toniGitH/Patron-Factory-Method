<?php

require_once 'Vehiculo.php';

/**
 * Clase Camion - Vehículo concreto
 */
class Camion implements Vehiculo {

    protected string $tipoVehiculo = "Camion";
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