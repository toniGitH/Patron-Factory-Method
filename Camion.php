<?php

    require_once 'MedioDeTransporte.php';

    class Camion implements MedioDeTransporte {

        private int $albaran;

        private function generarAlbaran(): int {
            // Simula la generación de un número de albarán
            $this->albaran = rand(1000, 9999);
            return $this->albaran;
        }

        // Implementación del método declarado en la interface MedioDeTransporte
        public function entregarPaquete(): string {
            $numAlbaran = $this->generarAlbaran();
            return "Envio por CAMIÓN: Generado albarán #$numAlbaran y cargando paquete.";
        }
    }
