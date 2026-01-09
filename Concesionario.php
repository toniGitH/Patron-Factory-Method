<?php

require_once 'FabricaDeVehiculos.php';

/**
 * Clase Concesionario.
 * ESTA ES LA CLAVE DE LOS BENEFICIOS DE USAR EL PATRÓN FACTORY METHOD.
 * Esta clase NO SABE qué tipo de vehículo vende.
 * Solo sabe que DISPON de una fábrica que puede entregar vehículos.
 */
class Concesionario {

    private FabricaDeVehiculos $fabrica;
    
    public function __construct(FabricaDeVehiculos $fabrica) {

        $this->fabrica = $fabrica;
    
    }
    
    /**
     * Este método funciona con CUALQUIER tipo de vehículo
     * No necesitas venderCoche(), venderMoto(), venderAutobus()
     */
    public function venderVehiculo(): string {

        return $this->fabrica->entregarVehiculo();

    }
}