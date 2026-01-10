<a name="top"></a>

# 🏭 El patrón Factory Method - Guía Completa

Repositorio creado para explicar el patrón Factory Method y su implementación mediante un ejemplo práctico en PHP.

<br>

## 📖 Tabla de contenidos

<details>
  <summary>Mostrar contenidos</summary>
  <br>
  <ul>
    <li>🔎 <a href="#-el-patrón-factory-method">El patrón Factory Method</a>
      <ul>
        <li>🎯 <a href="#-en-qué-consiste">¿En qué consiste?</a></li>
        <li>🔧 <a href="#-qué-problema-trata-de-resolver">¿Qué problema trata de resolver?</a></li>
        <li>❌ <a href="#-código-sin-patrón-el-problema">CÓDIGO SIN PATRÓN (El problema)</a></li>
        <li>✅ <a href="#-código-con-patrón-factory-method-la-solución">CÓDIGO CON PATRÓN FACTORY METHOD (La solución)</a></li>
        <li>🗝️ <a href="#-la-clave-inyección-e-inversión-de-dependencias">La Clave: Inyección e Inversión de Dependencias</a></li>
        <li>⚠️ <a href="#-nota-importante-cambio-de-lógica">Nota Importante: Cambio de Lógica</a></li>
        <li>💡 <a href="#-qué-ventajas-ofrece">¿Qué ventajas ofrece?</a></li>
      </ul>
    </li>
    <li>🧪 <a href="#-ejemplo-de-implementación-concesionario-de-vehículos">Ejemplo de implementación: Concesionario de vehículos</a>
      <ul>
        <li>🔎 <a href="#-el-problema-a-resolver">El Problema a resolver</a></li>
        <li>💡 <a href="#-ventajas-obtenidas">Ventajas obtenidas</a></li>
      </ul>
    </li>
    <li>📝 <a href="#-elementos-obligatorios-que-debe-cumplir-el-patrón-factory-method">Elementos Obligatorios que debe cumplir el patrón Factory Method</a>
        <ul>
            <li>📝 <a href="#-comparativa-teoría-vs-práctica">Comparativa: Teoría vs Práctica</a></li>
        </ul>
    </li>
    <li>🚀 <a href="#-cómo-ejecutar-la-aplicación">Cómo ejecutar la aplicación</a></li>
  </ul>
</details>

---

<br>

## 🔎 El patrón Factory Method

### 🎯 ¿En qué consiste?
El patrón **Factory Method** es un patrón de diseño creacional que resuelve el problema de crear objetos sin especificar la clase exacta del objeto que se creará.

En lugar de crear los vehículos directamente con el operador `new Coche()` (lo cual obligaría a tu código a conocer todos los detalles de cada coche), este patrón sugiere definir un "método fábrica" en una clase base. Las distintas fábricas hijas son las que deciden qué vehículo concreto crear.

### 🔧 ¿Qué problema trata de resolver?
Imagina que estás desarrollando el software para un **Concesionario**. Inicialmente, tu empresa solo vende **Coches**. Todo tu código está diseñado para trabajar con la clase `Coche`.

El problema surge cuando el negocio crece y decides empezar a vender **Motos**. Si tu código está lleno de referencias directas a `new Coche()`, tendrías que modificar toda la aplicación para añadir `if` y `else` por todas partes para decidir si crear un coche o una moto. Y si mañana quieres vender **Camiones**, tendrías que volver a cambiar todo el código del concesionario.

El problema fundamental es que el código de "venta" está demasiado atado al tipo específico de vehículo.

#### ❌ CÓDIGO SIN PATRÓN (El problema)
Si no usáramos el patrón, la clase `Concesionario` tendría que hacer dos cosas que no le corresponden: saber **qué** clases crear (`new Coche`, `new Moto`...) y saber **cómo** entregarlas.

Sin el patrón, la clase `Concesionario` depende de clases concretas, como `Coche` y `Moto`, por lo que está incumpliendo el principio de open/closed, de forma que si en el futuro quiero incluir nuevos vehículos, tendría que modificar la clase `Concesionario`.

Además, también está incumpliendo el principio de responsabilidad única porque tiene que saber cómo crear vehículos y también cómo entregar vehículos, cuando lo correcto sería delegar la creación y entrega a las fábricas hijas, y centrarse sólo en la venta.

```php
class Concesionario {
    public function venderVehiculo($tipo) {
        $vehiculo = null;

        // 1. FABRICACIÓN MANUAL (El If/Else interminable)
        if ($tipo === 'coche') {
            $vehiculo = new Coche('Seat', 'Rojo');
        } elseif ($tipo === 'moto') {
            $vehiculo = new Moto('Yamaha', 'Azul');
        } elseif ($tipo === 'camion') { 
            // Cada vez que quieras vender algo nuevo, tienes que tocar esta clase
            $vehiculo = new Camion('Volvo', 'Blanco'); 
        }

        // 2. ENTREGA MANUAL
        // Tienes que repetir la lógica de entrega aquí mismo
        $mensaje = "Fabricando vehículo...\n";
        $mensaje .= $vehiculo->probarVehiculo(); // <--- Usamos el objeto creado
        return $mensaje;
    }
}
```

#### ✅ CÓDIGO CON PATRÓN FACTORY METHOD (La solución)
Con el patrón, la clase `Concesionario` delega **todo**: tanto la creación (`new`) como el proceso de entrega, y se centra solamente en la venta.

Esto se consigue gracias a la inyección de dependencias, que nos permite pasar la fábrica concreta al constructor de la clase `Concesionario`, para que ésta se encargue de la fabricación y la entrega.

De esta forma, la clase Concesionario depende de abstracciones (`FabricaDeVehiculos`, `Vehiculo`), no de detalles concretos (`Coche`, `Moto`, `Camion`), por lo que no conoce ni le interesa conocer los detalles de la creación y entrega de los vehículos.

```php
class Concesionario {
    private FabricaDeVehiculos $fabrica;

    public function __construct(FabricaDeVehiculos $fabrica) {
        $this->fabrica = $fabrica;
    }

    public function venderVehiculo() {
        // Simple y limpio.
        // 'entregarVehiculo()' ya contiene internamente el 'new' (Factory Method)
        // y también el 'probarVehiculo()' (logica de negocio).
        return $this->fabrica->entregarVehiculo();
    }
}
``` 

Con este patrón, si sólo empiezas vendiendo coches, y más adelante decices vender Camiones y Motos, no tienes que tocar ni una línea del código del Concesionario que ya funciona. Sólo tienes que crear los productos concretos (Camion y Moto) y las fábricas concretas (FabricaDeCamiones y FabricaDeMotos), sin cambiar nada de la clase Concesionario.

Cuando se quiera vender una nueva moto, camión o coche, se creará una nueva instancia de Concesionario, pasándole la fábrica correcta.

Por ejemplo, para vender una moto:

```php
$concesionarioMotos = new Concesionario(new FabricaDeMotos());
echo $concesionarioMotos->venderVehiculo();
```

O lo que es lo mismo:

```php
$fabricaDeMotos = new FabricaDeMotos();
$concesionarioMotos = new Concesionario($fabricaDeMotos);
echo $concesionarioMotos->venderVehiculo();
```

### 🗝️ La Clave: Inyección e Inversión de Dependencias
La utilidad de este patrón reside en dos conceptos avanzados:
1.  **Inversión de Dependencias (DIP):** Sin el patrón, el `Concesionario` (módulo de alto nivel) depende de `Coche` y `Moto` (detalles de bajo nivel). Con el patrón, ambos dependen de abstracciones (`FabricaDeVehiculos`, `Vehiculo`).
2.  **Inyección de Dependencias:** Le "inyectamos" la fábrica correcta al `Concesionario` en su constructor. Así, el `Concesionario` no decide qué vende; **nosotros se lo decimos desde fuera**.

### ⚠️ Nota Importante: Cambio de Lógica
Es crucial entender que implementar este patrón **cambia la lógica interna de tu clase**.
*   **Sin patrón:** Tu clase `Concesionario` es un "hombre orquesta": decide, crea y gestiona. Sus métodos contienen toda la lógica de control (`if/else`, `new`, llamadas manuales).
*   **Con patrón:** Tu clase `Concesionario` se convierte en un "gerente": **delega** el trabajo. Sus métodos se simplifican drásticamente porque confían en que la fábrica inyectada sabrá qué hacer.

### 💡 ¿Qué ventajas ofrece?
1.  **Desacoplamiento:** El **Concesionario** (quien vende) no necesita saber si está vendiendo un Coche, una Moto o un Camión. Solo sabe que vende un "Vehículo".
2.  **Principio Open/Closed (Abierto/Cerrado):** Puedes empezar a vender nuevos tipos de vehículos (ej. Autobuses) sin tocar ni una línea del código del Concesionario que ya funciona.
3.  **Principio de Responsabilidad Única:** La lógica de "cómo se crea un camión" está aislada en su propia fábrica, no mezclada con la lógica de venta.

<br>

[🔝](#top)

---

<br>

## 🧪 Ejemplo de implementación: Concesionario de vehículos

En este proyecto hemos implementado exactamente esa solución para el **Concesionario**.

### 🔎 El Problema a resolver
Queríamos un `Concesionario` capaz de vender cualquier tipo de vehículo (Coche, Moto, Camión) y realizar procesos sobre ellos sin tener que programar lógica específica para cada uno (ej: `if ($tipo == 'coche') ...`).

### 💡 Ventajas obtenidas
1.  **Desacoplamiento en acción:**
    Si revisas la clase `Concesionario.php`, verás que **en ningún lugar aparece la palabra `Coche` o `Moto`**. 
    ```php
    private FabricaDeVehiculos $fabrica; // Solo conoce la abstracción
    ```
    El concesionario no sabe qué está vendiendo, y no le importa. Solo sabe que su fábrica le dará "algo" que es un `Vehiculo`.

2.  **Extensibilidad (Open/Closed):**
    Cuando quisimos añadir un nuevo vehiculo para la venta, como el **Autobús**, simplemente creamos `Autobus.php` y `FabricaDeAutobuses.php`. 
    **¡No tocamos ni una sola línea de código dentro de `Concesionario.php`!** Esto es el éxito del patrón: extender funcionalidad sin romper lo que ya funciona.

3.  **Lógica Común Centralizada:**
    La clase abstracta `FabricaDeVehiculos` define el proceso de entrega (`entregarVehiculo`). Gracias a esto, la lógica de *"Crear -> Verificar -> Entregar"* se define una sola vez y funciona automáticamente para motos, coches, camiones y cualquier otro tipo de vehículo que queramos añadir.

<br>

[🔝](#top)

---

<br>

## 📝 Elementos Obligatorios que debe cumplir el patrón Factory Method

Para que una implementación sea considerada **Factory Method**, debe cumplir estrictamente con cuatro participantes principales. Si falta alguno, probablemente no sea un Factory Method puro.

### 1. Producto genérico (Product)
Es una interfaz o clase abstracta común a todos los objetos que puede crear la fábrica y sus subclases.
*   **Interfaz vs Clase Abstracta:** Ambas son válidas. Si es una **interfaz**, define un contrato puro. Si es una **clase abstracta**, puede incluir código base compartido.
*   Define qué es lo que vamos a fabricar de forma genérica.

### 2. Productos concretos (Concrete Products)
Son las implementaciones específicas o subclases del Producto.
*   **Implementación vs Herencia:** Si el Producto es una interfaz, estas clases la **implementan**. Si es una clase abstracta, **heredan** de ella.
*   Es el objeto real que se crea (el coche, la moto, el camión...).

### 3. Creador genérico (Creator)
Es la clase que declara el método de fábrica (factory method).
*   **¿Debe ser abstracta?** Generalmente **SÍ**, para obligar a las subclases a implementar el método de fábrica. Sin embargo, en algunas variantes, puede ofrecer una implementación por defecto (ej: crear un Coche si no se especifica nada) y que las subclases puedan sobreescribirlo, aunque esta solución es menos limpia que utilizar una clase creadora abstracta (y en el ejemplo, la clase creadora genérica conocería una clase concreta, Coche, lo que ensuciaría la pureza de la abstracción).
*   **El Factory Method:** Es el método clave (ej: `fabricarVehiculo`). Suele declararse como `abstract` para que cada fábrica concreta decida qué crear.

### 4. Creadores concretos (Concrete Creators)
Son las clases que sobrescriben o implementan el método de fábrica.
*   Es aquí donde realmente ocurre el `new Coche()` o `new Moto()`.
*   Oculta la complejidad de la instanciación al resto del sistema.

### 📝 Comparativa: Teoría vs Práctica

| Elemento del Patrón (Teoría) | En este Proyecto (Práctica) | Función que cumple |
| :--- | :--- | :--- |
| **Producto genérico (Interface o Clase abstracta)** | `interface Vehiculo` | Define que todos los vehículos deben tener el método `probarVehiculo()`. |
| **Producto concreto (clase que implementa la inerfaz o hereda de la clase abstracta)** | `Coche`, `Moto`, `Camion` | Implementan la versión específica de cada vehículo. |
| **Creador genérico (Clase Abstracta)** | `abstract class FabricaDeVehiculos` | Declara el método abstracto `fabricarVehiculo()` y contiene la lógica compartida (`entregarVehiculo`). |
| **Creador concreto (clase que hereda del Creador genérico)** | `FabricaDeCoches`, `FabricaDeMotos`, etc. | Deciden qué clase instanciar. Por ejemplo, `FabricaDeMotos` sabe que debe hacer `new Moto()`. |



<br>

[🔝](#top)

---

<br>

## 🚀 Cómo ejecutar la aplicación

Tienes dos alternativas para visualizar el resultado de la aplicación:
- visualizando los resultados mediante el navegador (con XAMPP o con un servidor web local).
- directamente desde la terminal, en texto plano, ejecutando el archivo principal, `main.php`.

En cualquiera de los dos casos, primero debes:
1. Crear la carpeta del proyecto (por ejemplo, patrones/factory-method) dentro de la carpeta htdocs (o equivalente según la versión de XAMPP y sistema operativo que uses).
2. Guardar en esa carpeta los archivos PHP y CSS.


#### 🖥️ Para ejecutarlo mediante la Terminal:

1. Abre la terminal y navega a la carpeta de tu proyecto, por ejemplo:

```bash
cd ~/Documentos/htdocs/patrones/factory-method
```

2. Ejecuta, desde esa ubicación, el archivo main.php:

```bash
php main.php
```

#### 📍 Para ejecutarlo mediante XAMPP:

1. Arranca XAMPP.
2. Accede a index.php desde tu navegador (por ejemplo: http://localhost/patrones/factory-method/index.php)

#### 📍 Para ejecutarlo usando el servidor web interno de PHP

PHP trae un servidor web ligero que sirve para desarrollo. No necesitas instalar Apache ni XAMPP.

1. Abre la terminal y navega a la carpeta de tu proyecto:

```bash
cd ~/Documentos/htdocs/patrones/factory-method
```
2. Dentro de esa ubicación, ejecuta:

```bash
php -S localhost:8000
```

>💡
>
> No es obligatorio usar el puerto 8000, puedes usar el que desees, por ejemplo, el 8001.

Con esto, lo que estás haciendo es crear un servidor web php (cuya carpeta raíz es la carpeta seleccionada), que está escuchando en el puerto 8000 (o en el que hayas elegido).

>💡
>
> Si quisieras, podrías crear simultáneamente tantos servidores como proyectos tengas en tu ordenador, siempre y cuando cada uno estuviera escuchando en un puerto diferente (8001, 8002, ...).

3. Ahora, abre tu navegador y accede a http://localhost:8000

Ya podrás visualizar el documento index.php con toda la información del ejemplo.

>💡
>
> No es necesario indicar `http://localhost:8000/index.php` porque el servidor va a buscar dentro de la carpeta raíz (en este caso, en Documentos/htdocs/patrones/factory-method), un archivo index.php o index.html de forma automática. Si existe, lo sirve como página principal.
>
> Por eso, estas dos URLs funcionan igual:
>
> http://localhost:8000
>
> http://localhost:8000/index.php


<br>

[🔝](#top)
