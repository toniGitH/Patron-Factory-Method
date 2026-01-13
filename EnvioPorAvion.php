<?php

    require_once 'Envio.php';
    require_once 'Avion.php';

    class EnvioPorAvion extends Envio {

        protected function crearMedioDeTransporte(): MedioDeTransporte {
            return new Avion();
        }
    }
