<?php

require_once 'Vehiculo.php';

/**
 * Clase Coche - Representa a un vehiculo CONCRETO de tipo Coche.
 * Debe implementar el método probarVehiculo() definido en la interfaz vehículo, puesto que se pretende que todo tipo de vehículo pueda ser probado.
 */
class Coche implements Vehiculo
{
    public function probarVehiculo(): void
    {
        echo "El coche funciona correctamente ...\n";
    }
}