<?php

require_once "Producto.php";

class ProductoConcretoB implements Producto {
    public function crearProductoConcreto(): string {
        return "Resultado del Producto B";
    }
}
