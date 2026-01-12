<?php

    require_once 'MedioDeTransporte.php';

    class Avion implements MedioDeTransporte {

        private string $codigoImportacion;
        private string $comunicacionAduanas;
        private string $numeroVuelo;

        private function generarCodigoImportacion(): string {
            $this->codigoImportacion = 'IMP-' . rand(1000, 9999);
            return $this->codigoImportacion;
        }

        private function comunicarEnAduanas(): string {
            $this->comunicacionAduanas = 'comunicado a aduanas con éxito';
            return $this->comunicacionAduanas;
        }

        private function asignarVuelo(): string {
            $this->numeroVuelo = 'IBERIA-' . rand(1000, 9999);
            return $this->numeroVuelo;
        }

        // Implementación del método declarado en la interface MedioDeTransporte
        public function entregarPaquete(): string {
            $codigo = $this->generarCodigoImportacion();
            $aduanas = $this->comunicarEnAduanas();
            $vuelo = $this->asignarVuelo();

            return "Envio por AVIÓN: Código importación $codigo $aduanas y mercancía embarcada en el vuelo $vuelo.";
        }
    }
