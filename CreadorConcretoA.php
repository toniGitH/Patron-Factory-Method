<?php

require_once "Creador.php";
require_once "ProductoConcretoA.php";

class CreadorConcretoA extends Creador {
    public function factoryMethod(): Producto {
        return new ProductoConcretoA();
    }
}
