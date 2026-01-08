<?php

require_once 'VehiculoFactory.php';
//require_once 'Vehiculo.php';
require_once 'Camion.php';


/**
 * Clase FabricaDeCamiones - Creador de camiones
 */
class FabricaDeCamiones extends VehiculoFactory
{
    /**
     * Implementación del Factory Method fabricarVehiculo(), definido pero no implementado en la clase abstracta VehiculoFactory.
     * Esta implementación SÍ determina qué tipo de objeto Vehiculo se crea (en este caso, se crea y retorna un objeto Camion)
     */
    public function fabricarVehiculo(): Vehiculo
    {
        return new Camion();
    }
}