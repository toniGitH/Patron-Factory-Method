ELEMENTOS NECESARIOS EN UN PATRÓN FACTORY METHOD

1. El objeto GENÉRICO que me interesa crear (producto, envío, vehículo, etc...), con las propiedades y métodos comunes a todos los objetos (ruedas, marca, ). En este ejemplo, el objeto genérico es un vehículo, y se representa con la interfaz Vehiculo.
2. Los diferentes objetos CONCRETOS que se pueden crear, y que están representados por clases concretas (clase Coche, clase Moto, clase Camión, etc...) que DEBEN implementar la interfaz Vehiculo..
3. Fabrica GENÉRICA de objetos GENÉRICOS que quiero crear (Clase Creator), en la que se define el método FACTORY METHOD que retorna un objeto GENÉRICO.
4. Clase Concreta Creator
5. Cliente
