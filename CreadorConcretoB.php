<?php

require_once "Creador.php";
require_once "ProductoConcretoB.php";

class CreadorConcretoB extends Creador {
    public function factoryMethod(): Producto {
        return new ProductoConcretoB();
    }
}
