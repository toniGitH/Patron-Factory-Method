<?php
require_once 'Envio.php';

abstract class GestorDeEnvios {

    abstract protected function crearEnvio(): Envio;

    public function procesarEnvio(): string {
        $envio = $this->crearEnvio();

        $resultado = "=== INICIO PROCESO DE ENVÍO ===\n";
        $resultado .= "1. Preparando documentación del pedido...\n";
        $resultado .= "2. Calculando ruta y coste de envío...\n";
        $resultado .= "3. {$envio->enviar()}\n";
        $resultado .= "4. Confirmando envío completado en el sistema.\n";
        $resultado .= "=== FIN PROCESO DE ENVÍO ===\n";

        return $resultado;
    }
}
