<?php

/**
 * Interfaz Vehiculo
 * Define el contrato que todos los diferentes tipos de vehiculo deben cumplir: todos los vehículos se deben poder probar para ver que funcionan correctamente.
 * El método probarVehículo se debe IMPLEMENTAR en TODOS los vehículos (coches, motos y camiones) que se creen.
 * Los diferentes tipos de vehículos que se creen (coches, motos y camiones) deben implementar esta interfaz.
 */
interface Vehiculo {
    
    public function probarVehiculo() : void;

}
