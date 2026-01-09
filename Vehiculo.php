<?php

/**
 * Clase Abstracta Vehiculo
 * Define qué puede hacer cualquier vehículo y contiene la lógica común
 */
abstract class Vehiculo {

    protected string $tipoVehiculo;
    protected string $marcaVehiculo;
    protected string $colorVehiculo;

    public function __construct(string $marcaVehiculo, string $colorVehiculo) {
        
        $this->marcaVehiculo = $marcaVehiculo;
        $this->colorVehiculo = $colorVehiculo;
    }

    // Método abstracto que obliga a las subclases a definir cómo se prueban
    // O podría ser un método concreto si el texto fuera siempre idéntico, 
    // pero como cambia "El/La", lo dejamos abstracto o lo implementamos usando otra propiedad.

    // Método implementado en la clase abstracta (ya no es abstracto)
    // Se hereda por todos los hijos (Coche, Moto, Camion...)
    public function probarVehiculo(): string {
        return ucfirst($this->tipoVehiculo) . " " . $this->marcaVehiculo . " de color " . $this->colorVehiculo . " funcionando correctamente ...";
    }
    
}