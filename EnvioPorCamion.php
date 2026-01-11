<?php

    require_once 'Envio.php';

    class EnvioPorCamion implements Envio {

        private int $albaran;

        private function generarAlbaran(): int {
            // Simula la generación de un número de albarán
            $this->albaran = rand(1000, 9999);
            return $this->albaran;
        }

        public function enviar(): string {
            $numAlbaran = $this->generarAlbaran();
            return "Envio por CAMIÓN: Generado albarán #$numAlbaran y cargando paquete.";
        }
    }
