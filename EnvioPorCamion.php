<?php

    require_once 'Envio.php';
    require_once 'Camion.php';

    class EnvioPorCamion extends Envio {

        protected function crearMedioDeTransporte(): Camion {
            return new Camion();
        }
    }
