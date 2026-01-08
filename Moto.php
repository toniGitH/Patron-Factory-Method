<?php

require_once 'Vehiculo.php';

/**
 * Clase Moto - Representa a un vehiculo CONCRETO de tipo moto.
 * Debe implementar el método probarVehiculo() definido en la interfaz vehículo, puesto que se pretende que todo tipo de vehículo pueda ser probado.
 */
class Moto implements Vehiculo
{
    public function probarVehiculo(): void
    {
        echo "La moto funciona correctamente ...\n";
    }
}