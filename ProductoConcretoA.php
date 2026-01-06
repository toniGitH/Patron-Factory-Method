<?php

require_once "Producto.php";

class ProductoConcretoA implements Producto {
    public function crearProductoConcreto(): string {
        return "Resultado del Producto A";
    }
}
