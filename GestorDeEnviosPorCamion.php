<?php

    require_once 'GestorDeEnvios.php';
    require_once 'EnvioPorCamion.php';

    class GestorDeEnviosPorCamion extends GestorDeEnvios {

        protected function crearEnvio(): Envio {
            return new EnvioPorCamion();
        }
    }
