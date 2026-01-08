<?php

require_once 'VehiculoFactory.php';
//require_once 'Vehiculo.php';
require_once 'Coche.php';


/**
 * Clase FabricaDeCoches - Creador de coches
 */
class FabricaDeCoches extends VehiculoFactory
{
    /**
     * Implementación del Factory Method fabricarVehiculo(), definido pero no implementado en la clase abstracta VehiculoFactory.
     * Esta implementación SÍ determina qué tipo de objeto Vehiculo se crea (en este caso, se crea y retorna un objeto Coche)
     */
    public function fabricarVehiculo(): Vehiculo
    {
        echo "Fabricando un coche ...\n";
        return new Coche();
    }
}