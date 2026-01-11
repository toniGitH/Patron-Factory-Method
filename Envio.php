<?php

    require_once 'MedioDeTransporte.php';

    abstract class Envio {

        abstract protected function crearMedioDeTransporte(): MedioDeTransporte;

        public function procesarEnvio(): string {
            $medioDeTransporte = $this->crearMedioDeTransporte();

            $resultado = "=== INICIO PROCESO DE ENVÍO ===\n";
            $resultado .= "1. Preparando documentación del pedido...\n";
            $resultado .= "2. Calculando ruta y coste de envío...\n";
            $resultado .= "3. {$medioDeTransporte->entregarPaquete()}\n";
            $resultado .= "4. Confirmando envío completado en el sistema.\n";
            $resultado .= "=== FIN PROCESO DE ENVÍO ===\n";

            return $resultado;
        }
    }
