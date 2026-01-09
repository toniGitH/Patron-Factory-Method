<?php

require_once 'FabricaDeVehiculos.php';
require_once 'Moto.php';

/**
 * Clase FabricaDeMotos - Fábrica concreta
 * Solo implementa el método fabricarVehiculo() para crear y devolver una instancia de Moto
 */
class FabricaDeMotos extends FabricaDeVehiculos {

    protected string $marcaVehiculo;
    protected string $colorVehiculo;
    
    public function __construct(string $marcaVehiculo, string $colorVehiculo) {
        $this->marcaVehiculo = $marcaVehiculo;
        $this->colorVehiculo = $colorVehiculo;
    }
    
    // Este es el FACTORY METHOD, heredado de FabricaDeVehiculos, pero que en esta fábrica concreta (FabricaDeMotos) se implementa para crear y devolver una instancia de Moto.
    protected function fabricarVehiculo(): Vehiculo {
        return new Moto($this->marcaVehiculo, $this->colorVehiculo);
    }

    // protected function entregarVehiculo(): string {}
    // Esta clase también dispone del método entregarVehiculo(), heredado de FabricaDeVehiculos, pero que en esta fábrica concreta (FabricaDeMotos) se implementa para crear y devolver una instancia de Moto.
    // Este método no hay que implementarlo en esta fábrica concreta, ya que el método entregarVehiculo() de la clase FabricaDeVehiculos ya está implementado y es heredado por todas las fábricas hijas (concretas).
    
}