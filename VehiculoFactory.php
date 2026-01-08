<?php

require_once 'Vehiculo.php';

/**
 * Clase VehiculoFactory - Esta es la clase donde se aplica el Factory Method
 * Esta clase representa una fabrica GENÉRICA que crea vehículos, y debe poder:
 *  - tener un método para recibir los pedidos de los vehículos por parte de un cliente.
 *  - tener un método que FABRIQUE cada coche una vez que se recibe el pedido. Este método es el propio Factory Method., y debe ser abstracto, porque es
 *    implementado por cada fábrica concreta que herede de esta clase abstracta (FabricaDeCoches, FabricaDeMotos y FabricaDeCamiones) 
 */
abstract class VehiculoFactory
{
    /**
     * FACTORY METHOD: método factory que crea y retorna un objeto Vehiculo..
     * Este método abastracto "impone" la obligación de devolver un objeto Vehiculo, pero no determina si debe ser un coche, moto o camión.
     * Este método es abstracto, no se implementa en esta clase, sino que lo va a implementar cada una de las clases que hereden de ella.
     * Cuando una clase que herede de ésta, implemente este método, será esa clase hija la que SÍ determinará de qué tipo será el objeto Vehiculo generado.
     * Las clases que heredan de esta clase son las clases que crearán cada tipo de envío (FabricaDeCoches, FabricaDeMotos y FabricaDeCamiones).
     */
    abstract public function fabricarVehiculo(): Vehiculo;

    /**
     * Representa el método que será usado por el "cliente" para solicitar un nuevo vehículo.
     * Este método es el que se utilizará en el archivo main.php cada vez que se quiera un nuevo vehículo.
     * En la implementación de este método hemos dedicido que, además de ordenar la fabricación del vehículo, éste se debe probar después.
     */
    /* public function solicitarVehiculo(): void
    {
        $vehiculo = $this->fabricarVehiculo();
        $vehiculo->probarVehiculo();
    } */
}