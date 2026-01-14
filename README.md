<a name="top"></a>

# 🏭 El patrón Factory Method - Guía Completa

Repositorio creado para explicar el patrón **Factory Method** y su implementación mediante un ejemplo práctico en **PHP**.

<br>

## 📖 Tabla de contenidos

<details>
  <summary>Mostrar contenidos</summary>
  <br>
  <ul>
    <li>🏭 <a href="#-el-patrón-factory-method">El patrón Factory Method</a>
      <ul>
        <li>💡 <a href="#-entendiendo-la-definición">Entendiendo la definición</a></li>
        <li>👨🏼‍🔧 <a href="#-aplicando-la-definición-a-un-caso-práctico-creación-de-un-módulo-de-envíos">Aplicando la definición a un caso práctico: creación de un módulo de envíos</a></li>
        <li>🛂 <a href="#-elementos-obligatorios-que-debe-tener-un-patrón-factory-method">Elementos obligatorios que debe tener un patrón Factory Method</a></li>
        <li>🎯 <a href="#-qué-objetivos-se-buscan-al-aplicar-el-patrón-factory-method">¿Qué objetivos se buscan al aplicar el patrón Factory Method?</a></li>
        <li>👎🏼 <a href="#-siempre-es-conveniente-aplicar-el-patrón-factory-method">¿Siempre es conveniente aplicar el patrón Factory Method?</a></li>
      </ul>
    </li>
    <li>🧪 <a href="#-ejemplo-de-implementación-módulo-de-gestión-de-envíos">Ejemplo de implementación: Módulo de Gestión de Envíos</a>
      <ul>
        <li>🎡 <a href="#-qué-hace-esta-aplicación-de-ejemplo">¿Qué hace esta aplicación de ejemplo?</a></li>
        <li>🔄 <a href="#-flujo-completo-de-esta-aplicación-de-ejemplo">Flujo completo de esta aplicación de ejemplo</a></li>
        <li>👉🏼 <a href="#-identificación-de-los-principales-archivos-del-ejemplo">Identificación de los principales archivos del ejemplo</a></li>
      </ul>
    </li>
    <li>🚀 <a href="#-cómo-ejecutar-la-aplicación">Cómo ejecutar la aplicación</a></li>
  </ul>
</details>

---

<br>

## 🏭 El patrón Factory Method

Factory Method es un patrón **creacional** que define, en una **clase base**, un **método fábrica** para solicitar la **creación de un objeto**, delegando en las **subclases** la decisión de qué tipo concreto crear, siempre que todos los objetos creados cumplan un **contrato** común.

A menudo a los elementos que "componen" este patrón se les llama de esta forma:

- clase base => Creadora
- subclases => CreadoraConcreta
- objeto genérico => Producto
- objeto concreto => ProductoConcreto

<br>

>💡 Para entender mejor el patrón, se recomienda que la clase base y el método fábrica sean ***abstract***.
>
>⚠️ No todos los lenguajes permiten el uso de *abstract*, pero en aquellos que sí lo permitan (PHP, Java, ...), se recomienda que tanto la clase base como el método fábrica sean *abstract* (NO es obligatorio, pero sí recomendado cuando sea posible, porque es más coherente con la intención del patrón y facilita mucho la comprensión del mismo).
>
>✅ Si no queremos/podemos utilizar *abstract* no hay ningún problema, pero debemos tener en cuenta que eso supondría:
> - respecto a la clase base, que estaríamos creando una clase base instanciable, que equivaldría a una "creadora concreta por defecto"
>
> - respecto al método fábrica, que tendríamos un método fábrica que devolvería un "ProductoConcreto por defecto".



### 💡 Entendiendo la definición

Para tratar de entender mejor este patrón, y como el lenguaje usado en este repositorio es PHP, vamos a obligar a que tanto la clase base como el método fábrica sean abstractos (*abstract*).

#### 🧩 Elementos principales que aparecen en esta definición

📌 **CLASE BASE**: vamos a considerar que, en general, representa la **abstracción** de un proceso, una fase o una funcionalidad completa, compuesta por una serie de pasos o instrucciones, entre las que se encuentra la creación de algún tipo de **OBJETO**, necesario en algún punto o instrucción de ese proceso. Esa clase base, como hemos dicho anteriormente, va a ser abstracta, por lo que **no se podrá instanciar** (esto es importante para más adelante).

📌 **CREACIÓN DE UN OBJETO**: como se acaba de apuntar, se trata de un objeto necesario para que la funcionalidad se pueda realizar. Una condición para que tenga sentido aplicar este patrón, es considerar que el tipo de objeto que la clase base necesita no siempre va a ser del mismo tipo, sino que será variable según cada situación (por ejemplo, en un sistema de gestión de envíos, se utiliza algún medio de transporte para llevar a cabo el envío, pero en función de cada envío, el medio de transporte a usar puede variar, siendo necesario a veces un camión, a veces un barco, etc...).

La razón de ser de este patrón es ese objeto, y concretamente obecede a dos cosas:

- a que su participación es necesaria en algún momento del proceso y
- a que no siempre se va a utilizar el mismo tipo de objeto

Por tanto, **este patrón existe para ayudar a la clase base (y en definitiva, a sus subclases) a gestionar el uso de ese objeto**. 

📌 **MÉTODO FÁBRICA**: tal y como se establece en la definición, se trata de un método **declarado en la clase base** y cuyo objetivo o finalidad es fabricar, crear o instanciar ese objeto al que nos referíamos anteriormente (Producto - ProductoConcreto). Y de nuevo, para facilitar la comprensión del patrón, vamos a obligar a que ese método sea abstracto, lo que implica que sólo estará declarado, pero no implementado, en la clase base, sino en sus hijas, las subclases.

📌 **SUBCLASES**: son clases hijas o que **heredan de la clase base**, y son las que tienen que **implementar el método fábrica**. Representan la concreción de la abstracción que representa la clase base. Es decir, que si la clase base representa, por ejemplo, un **Envio**, las clases hijas podrían representar sus concreciones (*EnvioPorCamion*, *EnvioPorBarco*, etc...).

Estas subclases son las que se van a instanciar en cada caso (no la clase base), y por tanto, son las que van a determinar en cada situación, mediante su implementación del método fábrica, el tipo de objeto que se va a crear en cada situación.

A pesar de disponer de este método fabrica, la principal responsabilidad de la subclase, o clase CreadoraConcreta, no es crear objetos ProductoConcreto. Normalmente contiene cierta lógica de negocio, que depende de los objetos ProductoConcreto devueltos por el método fábrica.

Es decir, que esas subclases se instanciarán, como cualquier otra clase, con el **new** y darán lugar a un objeto de esa subclase (*EnvioPorCamion*, *EnvioPorBarco*, etc...), pero además, contarán con un método fábrica que servirá para crear o instanciar objetos de otra clase (*Camion*, *Barco*, etc...), relacionada con cada subclase.

Por ejemplo, una clase *EnvioPorBarco* (heredera de la clase base, *Envio*):

- **contendrá una lógica de negocio específica** y común a cualquier proceso de envío, ya sea por Barco, Camión, etc..., como por ejemplo, un método *procesarEnvío()*
- **podrá ser instanciada**, generando diferentes objetos de tipo *EnvioPorBarco*
- **implementará un método abstracto (el método fábrica)**, por ejemplo, llamado *crearMedioDeTransporte()*, que le permitirá generar un objeto de otra clase (*Barco*), que será llamado internamente dentro de su lógica de negocio específica, por ejemplo, dentro de aquel método *procesarEnvio()*

Así, un envío (clase base *Envio*) que requiera enviar algo mediante un determinado medio de transporte, por ejemplo, un Camión (es decir, la subclase *EnvioPorCamion*), implementará el método fábrica abstracto declarado en la clase base *Envio*, y que podría llamarse, por ejemplo, *crearMedioDeTransporte()*, y que generaría un objeto de tipo *MedioDeTransporte*, concretamente, un objeto de tipo *Camion*:

```
protected function crearMedioDeTransporte(): Camion {
            return new Camion();
        }
```

📌 **CONTRATO**: para que este patrón funcione, un último requisito es que TODAS las clases que representan los objetos concretos o ProductoConcreto necesarios para la ejecución del proceso, y que como ya se ha dicho, son creados por las subclases (herederas de la clase base), **DEBEN** estar sujetas o **IMPELENTAR** una **INTERFACE**.

Esa interfaz representaría al Producto (no ProductoConcreto), es decir, a una abstracción del ProductoConcreto. Es una definición genérica que determina qué métodos deben cumplir o implementar TODOS los objetos ProductoConcreto.

Si tenemos en cuenta que cada uno de los objetos concretos de los que estamos hablando tienen sus propios métodos y propiedades específicas y diferentes, es muy fácil identificar este **contrato** como un punto **en común** que todos ellos **exponen** a la aplicación, y que permiten el funcionamiento del patrón.

Por ejemplo, un taladro y un soldador funcionan de maneras diferentes, con métodos y propiedades diferentes, pero podemos tener un método común, llamado, por ejemplo, *arreglar()* en cada uno de ellos, que en cada herramienta será implementado de manera diferente, en función de los métodos y propiedades particulares de cada herramienta.

Por ejemplo, un Camión y un Barco funcionan de manera diferente, tienen propiedades y métodos propios, diferentes los del Camión de los del Barco, pero el hecho de implementar la interface *MedioDeTransporte* les obliga a tener un método común, llamado, por ejemplo, *entregarPaquete()*, cuya implementación será diferente en ambos casos, dependiendo de sus métodos y propiedades propios, pero que en definitiva, será un **método común a TODOS los objetos* del tipo *MedioDeTransporte*.


### 👨🏼‍🔧 Aplicando la definición a un caso práctico: creación de un módulo de envíos

Supongamos que tenemos una tienda online, y un cliente compra un determinado artículo y selecciona un método de envío de los que hay disponibles (por camión, por barco o por avión). 

Queremos desarrollar el módulo de la aplicación que se encarga de gestionar el envío de ese pedido del cliente, para que, una vez que el cliente finalice el pedido y seleccione el método de envío que desea, en ese momento, se haga una llamada a ese módulo para que se encarge de gestionar el envío.

Ese módulo estaría representado nuestra clase base *Envio*, el corazón del gestor de envíos, es decir, una abstracción del proceso de envío de un pedido en la tienda online, cuyas concreciones son los diferentes tipos de envío: las subclases *EnvioPorBarco*, *EnvioPorCamion* y *EnvioPorAvion*.

Ese proceso de envío podría tener:

- una determinada lógica, por ejemplo, un método llamado *procesarEnvio()*, **COMÚN** a cualquier proceso de envío (preparación de la documentación, cálculo de ruta, etc...), independientemente de si es por barco, avión o camión, y además,
- una parte de lógica que, obviamente, será diferente dependiendo de si el envío se hace por carretera, por barco o avión, que estará "incluida dentro" de ese método *procesarEnvio()* y que dependerá/implicará la creación de un determinado medio de transporte (camión, barco o avión).

Si no aplicáramos el patrón Factory Method, supondría que no habría una clase base y subclases, sino sólo una única clase *Envío* (no abstracta), en la que:

- la lógica común no sería un problema, porque es común, independientemente del medio de transporte, y aunque quisiéramos ampliar nuestro servicio de envíos a nuevos medios de transporte, como moto, furgoneta, etc..., esa lógica se mantendría y no habría que cambiar nada de ella.

- la parte que depende del medio de transporte concreto, sí podría representar un problema, porque en la clase *Envio* tendríamos que manejar las diferentes opciones de envío mediante, por ejemplo, condicionales del tipo:

```
-> si el envio es por camión => crea un objeto Camion y ejecuta => Camion->entregarPaquete()
-> si no, si el envío es por barco => crea un objeto Barco y ejecuta => Barco->entregarPaquete()
-> si no, si el envío es por avión => crea un objeto Avion y ejecuta => Avion->entregarPaquete()
``` 

Esto no está mal de por sí, y en muchos casos podría ser la implementación correcta, pero representa un problema potencial: ¿qué pasa si nuestra empresa crece y, en el futuro, queremos ofrecer, además, transporte en moto y transporte en furgoneta?

Tendríamos que incluir dos condicionales más dentro de nuestra clase *Envio*:

```
-> si no, si el envío es por moto => crea un objeto Moto y ejecuta => Moto->entregarPaquete()
-> si no, si el envío es por avión => crea un objeto Furgoneta y ejecuta => Furgoneta->entregarPaquete()
```
Y esto va en contra del segundo principio **SOLID**, el *Open/Closed*:

*`una clase debe estar abierta para la extensión (se pueden añadir nuevas funcionalidades), pero cerrada paraa la modificación (no se debe cambiar el código fuente para añadir algo nuevo).`*

Y esto pasa porque, si lo analizamos, podemos identificar claramente que nuestra clase *Envio* está fuertemente ACOPLADA a estos objetos CONCRETOS (*Barco*, *Avion*, etc...).

La solución a este problema consiste en desacoplar la clase *Envio* de la creación de esos objetos (ya no habría que hacer un *new Camion()*), y delegar dicha función a un método fábrica.

Esto se logra convirtiendo la clase *Envio* en una clase base (abstracta preferiblemente) y crear tantas subclases como tipos de envio tengamos (*EnvioPorCamion*, *EnvioPorBarco*, etc...). En la clase base se declarará un método fábrica (preferiblemente abstracto) que será implementado en las subclases y que se denomina método fábrica (Factory Method) porque se responsabiliza de fabricar o crear objetos.

Podríamos ver esas subclases como creadoras concretas de medios de transporte (aunque repetimos la idea de que **no es su principal responsabilidad**):

- la clase EnvioPorCamion:crea un objeto EnvioPorCamion que dispone de un método que crea un camión => EnvioPorCamion->crearMedioDeTransporte() : Camion
- la clase EnvioPorBarco => crea un objeto EnvioPorBarco que dispone de un método que crea un barco => EnvioPorBarco->crearMedioDeTransporte() : Barco
- la clase EnvioPorAvion => crea un objeto EnvioPorAvion que dispone de un método que crea un avión => EnvioPorAvion->crearMedioDeTransporte() : Avion

Y tiene sentido que las llamenos subclases, por dos motivos:

- son clases que heredan de otra, concretamente de la clase base *Envio*
- si la clase base es abstracta (aunque no es imprescindible que lo sea), aún tiene más sentido que hablemos de subclases, porque la clase base abstracta no puede ser instanciada, por el hecho de ser abstracta, y por tanto, son sus hijas, las subclases, las que deben instanciarse.

Llegados a este punto, lo que hemos logrado es tener una clase base *Envio* que contiene una lógica que no depende en absoluto de ningún objeto concreto, sino de una abstracción (concretamente, de un método abstracto que se encarga de crear los objetos, según el tipo de envío).

Podríamos visualizar la clase base de una forma básica y simplificada, con dos métodos:

- un método *procesarEnvío()* que contenga toda la lógica del proceso de envío, y que en su implementación, en la parte de lógica que dependa del medio de transporte necesita utilizar un objeto MedioDeTransporte, y
- un método fábrica *crearMedioDeTransporte()* sobre el que se delega la responsabilidad de crear el medio de transporte oportuno para satisfacer el tipo de envío correspondiente al pedido que hizo la llamada al módulo de envíos.

Finalmente, debemos crear las clases que representan los diferentes medios de transporte que nuestro servicio de envíos va a utilizar (*Camion*, *Barco*, *Avion*, etc...) y "someterlos" a un **contrato** de obligado cumplimiento, es decir, a una *Interface MedioDeTransporte*.

En dicha Interface declararemos un método, llamado por ejemplo, *entregarPaquete()*, que deberán implementar obligatoriamente TODAS las clases que representen esos medios de transporte, aunque cada una de ellas lo implementará como mejor considere, en base a los métodos y propiedades específicos de cada medio de transporte.

De esta manera, habremos construido un patrón Factory Method

### 🛂 Elementos obligatorios que debe tener un patrón Factory Method

De todo lo dicho anteriormente podemos resumir que un patrón Factory Method debe tener estos 5 elementos:

1️⃣ Una **clase base**, también llamada Creadora, que preferiblemente será abstracta y que en su interior **tendrá declarado un método fábrica** (el Factory Method) y normalmente también tendrá una lógica o método no abstracto y por tanto, implementado y que estará disponible para todas sus hijas (las subclases).
En nuestro ejemplo, sería la clase **Envio**.

2️⃣ Un **método fábrica**, el Factory Method (preferiblemente abstracto), que **deberá ser implementado en las subclases que heredan de la clase base**. Es importante que el tipo de retorno de este método coincida con la interface que representa el Producto (lógicamente, si la interface es una abstracción del objeto a manejar, el método fábrica que produce los objetos o ProductoConcreto debe devolver algo que sea del mismo tipo que dicha interface).
En nuestro ejemplo, sería el método *crearMedioDeTransporte()*.

3️⃣ **Subclases** que heredan de la clase base, también conocidas como clases CreadoraConcreta, que **deberán implementar el método fábrica** y que además, heredarán el método no abstracto (con lógica común) definido en la clase base.
En nuestro ejemplo, serían las clases *EnvioPorCamion*, *EnvioPorBarco*, etc...

4️⃣ Una **interface** que represente el Producto u objeto que la lógica de negocio de la clase Creadora (y las subclases CreadoraConcreta) requieren para su funcionamiento.
En nuestro ejemplo, sería la interface *MedioDeTransporte*.

5️⃣ **Clases ProductoConcreto**, que **deberán implementar la interface** anterior.
En nuestro ejemplo, serían las clases *Camion*, *Barco*, *Avion*, etc...

### 🎯 ¿Qué objetivos se buscan al aplicar el patrón Factory Method?

**📌 Desacoplamiento**
La lógica de negocio del proceso que queremos implementar (por ejemplo, sistema de envíos) no se encarga de crear el ProductoConcreto que se necesita en dicha lógica, sino que se delega a un método fábrica, que es implementado por cada clase CreadoraConcreta (tipo de envío específico), lo que flexibiliza y dinamiza todo el proceso.

**📌 Escalabilidad (Principio SOLID Open/Closed)**
Si tuviéramos una clase *Envío*, cuya lógica dependiera directamente de los diferentes objetos concretos, necesitaríamos una lógica condicional para establecer qué hacer en cada caso específico (si es *EnvioPorBarco*, crear nuevo *Barco*, si es *EnvioPorAvion*, crear nuevo *Camion*, etc...), lo que supondría:
- en el caso de disponer de un elevado número de objetos concretos diferentes (medios de transporte), esos condicionales acabarían "ensuciando" la lógica de la clase *Envio*
- en el caso de querer incorporar, en el futuro, nuevos objetos concretos al proceso (nuevos medios de transporte), habría que modificar la clase *Envio*, lo que iría en contra del principio Open/Closed.

**📌 Separación de responsabilidades (Principio SOLID de responsabilidad única).**
Mover el código de creación de producto a un lugar del programa, haciendo que el código sea más fácil de mantener.

### 👎🏼 ¿Siempre es conveniente aplicar el patrón Factory Method?

Hay que tener en cuenta que la aplicación de este patrón puede suponer que el código se complique, ya que debes incorporar una multitud de nuevas subclases para implementarlo.

Por tanto, es necesario analizar si realmente lo que queremos hacer se beneficia de la aplicación de este patrón.

Por ejemplo, si sabemos SEGURO que nuestra aplicación no va a escalar en ese aspecto en concreto (por ejemplo, que sólo vamos a hacer envíos mediante moto, y NUNCA vamos a incorporar nuevos medios de transporte), no tiene demasiado sentido la aplicación de este patrón.

<br>

[🔝](#top)

---

<br>

## 🧪 Ejemplo de implementación: Módulo de Gestión de Envíos

### 🎡 ¿Qué hace esta aplicación de ejemplo?

Tenemos una tienda online que ofrece el servicio de envíos.

Cuando un cliente compra un artículo, selecciona el tipo de envío que desea (por camión, por barco o por avión).

Con ayuda del patrón Factory Method vamos a desarrollar, para esa tienda online, un **módulo de envíos** que se encargará de gestionar el envío de los pedidos, de forma que cada vez que se complete un pedido (y se seleccione el tipo de envío), se haga una llamada a dicho módulo para gestionarlo.

En este caso, nuestra tienda online sería el "cliente" que consumirá ese módulo (no confundir con el cliente que compra en la tienda online).

Vamos a representar dicho cliente en un archivo `main.php` que simulará varias compras y por tanto, varias "peticiones" al módulo de envíos que vamos a implementar.

### 🔄 Flujo completo de esta aplicación de ejemplo

1. Supongamos un cliente que compra un artículo en nuestra tienda online y necesita que se le envíe por barco.

    En ese momento, la lógica de negocio de nuestra tienda online, antes de llamar al módulo de envíos, ya sabe que el envío es por barco, porque lo ha seleccionado el comprador (la aplicación no tiene manera de saberlo si no lo especifica el comprador), por lo que se crea una instancia de *EnvioPorBarco*:

```
$envioPedidoXXX = new EnvioPorBarco();
```

2. Una vez hecho esto, se llama al módulo de envíos, para que gestione el envío de ese pedido XXX mediante los medios que correspondan en ese caso concreto.

    El cliente que llama al módulo (main.php) no conoce, ni le interesa ni necesita conocer qué medio de transporte concreto hay que crear ni cuál es la lógica del envío en ese caso concreto, ni en ningún otro caso concreto. Sólo necisita que se le diga qué tipo de envío es (*EnvioPorBarco*) y le solicitará que procese el envío:

```
$resultado = $envioPedidoXXX->procesarEnvio();

echo $resultado;
```

### 👉🏼 Identificación de los principales archivos del ejemplo

#### ➡️ Envio.php

Es la clase base, la clase Creadora, que en nuestro caso es *abstract* y que contiene:

- una lógica de negocio común *procesarEnvio()*, que depende de un objeto Producto (ProductoConcreto)
- el método fábrica *crearMedioDeTransporte()* que es la responsable de crear los objetos Producto (ProductoConcreto), y que es abstracto (no está implementado aquí)

### 👉🏼 Identificación de los principales archivos del ejemplo

#### ➡️ Envio.php

Es la clase base, la clase Creadora, que en nuestro caso es *abstract* y que contiene:

- una lógica de negocio común *procesarEnvio()*, que depende de un objeto Producto (ProductoConcreto)
- el método fábrica *crearMedioDeTransporte()* que es la responsable de crear los objetos Producto (ProductoConcreto), y que es abstracto (no está implementado aquí)

#### ➡️🚚 EnvioPorCamion.php - ➡️🚢 EnvioPorBarco.php - ➡️✈️ EnvioPorAvion.php

Son las subclases, herederas de la clase base *Envio*. Tanbién llamadas clases de tipo ClaseCreadora.

Estas subclases:

- implementan el método fábrica declarado en la clase base
- heredan el método *procesarEnvio()* declarado e implementado en la clase base

#### 🔌 MedioDeTransporte.php

Representa una abstracción de ese objeto Producto.

Es la **Interface** que todos las clases de tipo ProductoConcreto deben implementar.

Contiene la declaración de un método *entregarPaquete()* que TODAS las clases de tipo ProductoConcreto deben implementar (cada una podrá hacerlo de una manera diferente).

Esta Interface **coincide con el tipo de retorno del método fábrica** *crearMedioDeTransporte()*

#### 🚚 Camion.php - 🚢 Barco.php - ✈️ Avion.php

Son las diferentes clases que representan a cada uno de los objetos de tipo ProductoConcreto.

Estas clases implementan el método declarado en la Interface *MedioDeTransporte*.

#### 👩🏼‍💻 GestorDeEnvios.php

Este archivo NO forma parte del patrón Factory Method.

Representa un cliente de alto nivel que usa el patrón Factory Method:
- Necesita procesar envíos de diferentes tipos.
- No conoce, ni le interesa ni necesita conocer qué medio de transporte concreto hay que crear ni cuál es la lógica del envío en ese caso concreto.
- Solo necesita que el envío se procese correctamente.
- Puede trabajar con cualquier tipo de envío futuro sin modificaciones.
- No se mezcla con responsabilidades de presentación o documentación.
- Dispone de dos métodos (uno para procesar envíos múltiples y otro para envíos individuales).

#### 🖥️ main.php

Actúa como orquestador y punto de entrada de la demostración del patrón Factory Method.

1. Simula escenarios reales de uso: Define diferentes solicitudes de envío (múltiples e individuales) que podrían llegar al sistema.
2. Orquesta la interacción: Utiliza el GestorDeEnvios (cliente de alto nivel) para procesar las solicitudes, demostrando cómo se usa el patrón en la práctica.
3. Prepara los datos para presentación: Combina los resultados del procesamiento con información descriptiva (títulos, descripciones) para que puedan ser mostrados.
4. Sirve como fuente de datos: Proporciona las variables $resultados y $ventajas que son consumidas por index.php para la presentación web, o las muestra directamente en CLI.

#### 🌐 index.php - 🎨 estilos.css

Archivos destinados a la visualización de resultados a través de navegador.

<br>

[🔝](#top)

---

<br>

## 🚀 ¿Cómo ejecutar la aplicación?

Tienes dos alternativas para visualizar el resultado de la aplicación:
- visualizando los resultados mediante el **navegador** (con XAMPP o con un servidor web local).
- directamente desde la **terminal**, en texto plano, ejecutando el archivo principal, `main.php`.

En cualquiera de los dos casos, primero debes:
1. Crear la carpeta del proyecto (por ejemplo, patrones/factory-method). 
2. Guardar en esa carpeta los archivos PHP y CSS.


#### 🖥️ Para ejecutarlo mediante la Terminal:

1. Abre la terminal y navega a la carpeta de tu proyecto, por ejemplo:

```bash
cd ~/Documentos/Proyectos/patrones/factory-method
```

2. Ejecuta, desde esa ubicación, el archivo main.php:

```bash
php main.php
```

#### 🌐 Para ejecutarlo mediante XAMPP:

1. Mueve la carpeta del proyecto a la carpeta htdocs (o equivalente según la versión de XAMPP y sistema operativo que uses).
2. Arranca XAMPP.
3. Accede a index.php desde tu navegador (por ejemplo: http://localhost/patrones/factory-method/index.php)

#### 🌐 Para ejecutarlo usando el servidor web interno de PHP

PHP trae un servidor web ligero que sirve para desarrollo. No necesitas instalar Apache ni XAMPP.

1. Abre la terminal y navega a la carpeta de tu proyecto:

```bash
cd ~/Documentos/.../patrones/factory-method
```
2. Dentro de esa ubicación, ejecuta:

```bash
php -S localhost:8000
```

>💡 No es obligatorio usar el puerto 8000, puedes usar el que desees, por ejemplo, el 8001.

Con esto, lo que estás haciendo es crear un servidor web php (cuya carpeta raíz es la carpeta seleccionada), que está escuchando en el puerto 8000 (o en el que hayas elegido).

>💡 Si quisieras, podrías crear simultáneamente tantos servidores como proyectos tengas en tu ordenador, siempre y cuando cada uno estuviera escuchando en un puerto diferente (8001, 8002, ...).

3. Ahora, abre tu navegador y accede a http://localhost:8000

Ya podrás visualizar el documento index.php con toda la información del ejemplo.

>💡 No es necesario indicar `http://localhost:8000/index.php` porque el servidor va a buscar dentro de la carpeta raíz (en este caso, en Documentos/.../patrones/factory-method), un archivo index.php o index.html de forma automática. Si existe, lo sirve como página principal.
>
> Por eso, estas dos URLs funcionan igual:
>
> http://localhost:8000
>
> http://localhost:8000/index.php


<br>

[🔝](#top)
