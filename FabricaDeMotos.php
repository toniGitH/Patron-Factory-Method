<?php

require_once 'VehiculoFactory.php';
//require_once 'Vehiculo.php';
require_once 'Moto.php';

/**
 * Clase FabricaDeMotos - Creador de motos
 */
class FabricaDeMotos extends VehiculoFactory
{
    /**
     * Implementación del Factory Method fabricarVehiculo(), definido pero no implementado en la clase abstracta VehiculoFactory.
     * Esta implementación SÍ determina qué tipo de objeto Vehiculo se crea (en este caso, se crea y retorna un objeto Moto)
     */
    public function fabricarVehiculo(): Vehiculo
    {
        return new Moto();
    }
}