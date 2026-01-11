<?php

    require_once 'GestorDeEnvios.php';
    require_once 'EnvioPorBarco.php';

    class GestorDeEnviosPorBarco extends GestorDeEnvios {

        protected function crearEnvio(): Envio {
            return new EnvioPorBarco();
        }
    }
