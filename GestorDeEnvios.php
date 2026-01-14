<?php

    require_once 'Envio.php';

    /**
     * GestorDeEnvios - Cliente de alto nivel del patrón Factory Method
     * 
     * Esta clase demuestra cómo un cliente puede trabajar con diferentes tipos de envíos
     * sin necesidad de conocer los medios de transporte concretos (Camión, Barco, Avión).
     * 
     * El patrón Factory Method permite que el GestorDeEnvios trabaje únicamente con la
     * abstracción 'Envio', delegando la creación del medio de transporte específico
     * a las subclases concretas (EnvioPorCamion, EnvioPorBarco, EnvioPorAvion).
     */
    class GestorDeEnvios {

        // Método para procesar un pedido individualmente
        public function procesarPedido(Envio $tipoDeEnvio): string {
            // El gestor NO conoce qué medio de transporte se usará
            // Solo sabe que el objeto $tipoDeEnvio puede procesar envíos
            return $tipoDeEnvio->procesarEnvio();
        }

        // Método para procesar múltiples pedidos
        public function procesarMultiplesPedidos(array $pedidos): array {
            $salidas = [];

            foreach ($pedidos as $pedido) {
                $salidas[] = $this->procesarPedido($pedido);
            }

            return $salidas;
        }
    }
