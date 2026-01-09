<?php

require_once 'Vehiculo.php';

/**
 * Clase FabricaDeVehiculos - Fábrica abstracta
 * Contiene el proceso genérico de entrega
 */
abstract class FabricaDeVehiculos {
    
    /**
     * FACTORY METHOD
     * Este método lo implementa cada fábrica concreta
     */
    abstract protected function fabricarVehiculo(): Vehiculo;
    
    /**
     * TEMPLATE METHOD
     * Este método es IGUAL para todas las fábricas
     * Contiene el algoritmo completo de entrega
     */
    public function entregarVehiculo(): string {
        // Aquí NO SÉ qué tipo de vehículo se crea
        $vehiculo = $this->fabricarVehiculo();
        
        $resultado = "=== PROCESO DE ENTREGA ===\n";
        $resultado .= "1. Creando vehículo...\n";
        $resultado .= "2. Vehículo creado: " . $vehiculo->probarVehiculo() . "\n";
        $resultado .= "3. Verificando...\n";
        $resultado .= "4. ¡Listo para entregar!\n";
        
        return $resultado;
    }
}