<?php

    require_once 'Envio.php';
    require_once 'Camion.php';

    class EnvioPorCamion extends Envio {

        protected function crearMedioDeTransporte(): MedioDeTransporte {
            return new Camion();
        }
    }
