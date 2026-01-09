<?php

require_once 'FabricaDeVehiculos.php';
require_once 'Camion.php';

/**
 * Clase FabricaDeCamiones - Fábrica concreta
 * Solo implementa el método fabricarVehiculo() para crear y devolver una instancia de Camion
 */
class FabricaDeCamiones extends FabricaDeVehiculos {

    protected string $marcaVehiculo;
    protected string $colorVehiculo;
    
    public function __construct(string $marcaVehiculo, string $colorVehiculo) {
        $this->marcaVehiculo = $marcaVehiculo;
        $this->colorVehiculo = $colorVehiculo;
    }
    
    // Este es el FACTORY METHOD, heredado de FabricaDeVehiculos, pero que en esta fábrica concreta (FabricaDeCamiones) se implementa para crear y devolver una instancia de Camion.
    protected function fabricarVehiculo(): Vehiculo {
        return new Camion($this->marcaVehiculo, $this->colorVehiculo);
    }

    // protected function entregarVehiculo(): string {}
    // Esta clase también dispone del método entregarVehiculo(), heredado de FabricaDeVehiculos, pero que en esta fábrica concreta (FabricaDeCamiones) se implementa para crear y devolver una instancia de Camion.
    // Este método no hay que implementarlo en esta fábrica concreta, ya que el método entregarVehiculo() de la clase FabricaDeVehiculos ya está implementado y es heredado por todas las fábricas hijas (concretas).
    
}