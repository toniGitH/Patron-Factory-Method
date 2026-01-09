<?php

require_once 'FabricaDeVehiculos.php';
require_once 'Coche.php';

/**
 * Clase FabricaDeCoches - Fábrica concreta
 * Solo implementa el método fabricarVehiculo() para crear y devolver una instancia de Coche
 */
class FabricaDeCoches extends FabricaDeVehiculos {

    protected string $marcaVehiculo;
    protected string $colorVehiculo;
    
    public function __construct(string $marcaVehiculo, string $colorVehiculo) {

        $this->marcaVehiculo = $marcaVehiculo;
        $this->colorVehiculo = $colorVehiculo;

    }

    // Este es el FACTORY METHOD, heredado de FabricaDeVehiculos, pero que en esta fábrica concreta (FabricaDeCoches) se implementa para crear y devolver una instancia de Coche.
    protected function fabricarVehiculo(): Vehiculo {

        return new Coche($this->marcaVehiculo, $this->colorVehiculo);
        
    }

    // protected function entregarVehiculo(): string {}
    // Esta clase también dispone del método entregarVehiculo(), heredado de FabricaDeVehiculos, pero que en esta fábrica concreta (FabricaDeCoches) se implementa para crear y devolver una instancia de Coche.
    // Este método no hay que implementarlo en esta fábrica concreta, ya que el método entregarVehiculo() de la clase FabricaDeVehiculos ya está implementado y es heredado por todas las fábricas hijas (concretas).
    
}