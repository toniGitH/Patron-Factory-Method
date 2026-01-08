<?php

require_once 'Vehiculo.php';

/**
 * Clase Camion - Representa a un vehiculo CONCRETO de tipo Camión
 * Debe implementar el método probarVehiculo() definido en la interfaz vehículo, puesto que se pretende que todo tipo de vehículo pueda ser probado.
 */
class Camion implements Vehiculo
{
    public function probarVehiculo(): void
    {
        echo "El camión funciona correctamente ...\n";
    }
}