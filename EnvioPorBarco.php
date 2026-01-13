<?php

    require_once 'Envio.php';
    require_once 'Barco.php';

    class EnvioPorBarco extends Envio {

        protected function crearMedioDeTransporte(): MedioDeTransporte {
            return new Barco();
        }
    }
