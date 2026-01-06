<?php

require_once "Producto.php";

abstract class Creador {

    // El método fábrica devuelve un Producto
    abstract public function factoryMethod(): Producto;

    // Método que usa el cliente
    public function crearProducto(): string {
        $producto = $this->factoryMethod();
        return "Creador: El mismo creador ha trabajado con " . $producto->crearProductoConcreto();
    }
}
