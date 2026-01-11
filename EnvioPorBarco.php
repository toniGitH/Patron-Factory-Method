<?php

    require_once 'Envio.php';

    class EnvioPorBarco implements Envio {

        private string $codigoImportacion;
        private string $comunicacionAduanas;

        private function generarCodigoImportacion(): string {
            $this->codigoImportacion = 'IMP-' . rand(1000, 9999);
            return $this->codigoImportacion;
        }

        private function comunicarEnAduanas(): string {
            $this->comunicacionAduanas = 'comunicado a aduanas con éxito';
            return $this->comunicacionAduanas;
        }

        public function enviar(): string {
            $codigo = $this->generarCodigoImportacion();
            $aduanas = $this->comunicarEnAduanas();

            return "Envio por BARCO: Código importación $codigo $aduanas y cargando contenedor.";
        }
    }
