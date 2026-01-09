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
    // Dado que el usuario dijo que "casi idéntico", lo dejamos abstracto para respetar la implementación actual de los hijos
    // pero heredando ya las propiedades.
    abstract public function probarVehiculo(): string;
    
}