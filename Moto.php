<?php

require_once 'Vehiculo.php';

/**
 * Clase Moto - Vehículo concreto
 */
class Moto implements Vehiculo {

    protected string $tipoVehiculo = "Moto";
    protected string $marcaVehiculo;
    protected string $colorVehiculo;

    public function __construct(string $marcaVehiculo, string $colorVehiculo) {

        $this->marcaVehiculo = $marcaVehiculo;
        $this->colorVehiculo = $colorVehiculo;
        
    }

    public function probarVehiculo(): string {

        return "La $this->tipoVehiculo $this->marcaVehiculo de color $this->colorVehiculo funciona correctamente ...";
        
    }
    
}