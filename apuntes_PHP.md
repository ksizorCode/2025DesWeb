# Curso de PHP

Bienvenido al curso introductorio de PHP. En este repositorio encontrarás ejemplos y ejercicios para aprender los fundamentos de PHP.

## Índice

1. [Introducción a PHP](#introducción-a-php)
2. [Variables y Tipos de Datos](#variables-y-tipos-de-datos)
3. [Operadores](#operadores)
4. [Estructuras de Control](#estructuras-de-control)
5. [Funciones](#funciones)
6. [Manejo de Formularios](#manejo-de-formularios)
7. [Conexión con MySQL](#conexión-con-mysql)
8. [Programación Orientada a Objetos](#programación-orientada-a-objetos)
9. [Archivos y Sesiones](#archivos-y-sesiones)

---

## Introducción a PHP

PHP es un lenguaje de programación del lado del servidor diseñado para el desarrollo web.

- **Extensión de archivos:** `.php`
- **Sintaxis básica:**

```php
<?php
  echo "¡Hola, mundo!";
?>
```

---

## Variables y Tipos de Datos

| Tipo | Descripción | Ejemplo (Tipado devil) | Tipado Estricto |
|------|------------|---------|----------------|
| `string` | Texto | `$nombre = "Juan";` | `string $nombre = "Juan";` |
| `int` | Número entero | `$edad = 25;` | `int $edad = 25;` |
| `float` | Número decimal | `$precio = 10.99;` | `float $precio = 10.99;` |
| `bool` | Booleano | `$activo = true;` | `bool $activo = true;` |
| `array` | Arreglo | `$colores = ["rojo", "azul"];` | `array $colores = ["rojo", "azul"];` |
| `object` | Objeto | `$persona = new Persona();` | `Persona $persona = new Persona();` |

## Operadores

| Tipo | Operadores |
|------|------------|
| Aritméticos | `+`, `-`, `*`, `/`, `%` |
| Comparación | `==`, `!=`, `>`, `<`, `>=`, `<=` |
| Lógicos | `&&`, `||`, `!` |
| Asignación | `=`, `+=`, `-=`, `*=`, `/=` |

---

## Estructuras de Control

### Condicionales
```php
if ($edad >= 18) {
    echo "Eres mayor de edad.";
} else {
    echo "Eres menor de edad.";
}
```

### Bucles
```php
for ($i = 0; $i < 5; $i++) {
    echo "Número: $i <br>";
}
```

---

## Funciones

```php
function saludar($nombre) {
    return "Hola, " . $nombre;
}

echo saludar("Carlos");
```

---

## Manejo de Formularios

```php
<form method="POST" action="procesar.php">
    <input type="text" name="nombre">
    <input type="submit" value="Enviar">
</form>
```

En `procesar.php`:
```php
<?php
  echo "Hola, " . $_POST['nombre'];
?>
```

---

## Conexión con MySQL

```php
$conn = new mysqli("localhost", "usuario", "contraseña", "base_datos");
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
echo "Conexión exitosa";
```

---

## Programación Orientada a Objetos

```php
class Persona {
    public $nombre;
    function __construct($nombre) {
        $this->nombre = $nombre;
    }
    function saludar() {
        return "Hola, " . $this->nombre;
    }
}
$persona = new Persona("Carlos");
echo $persona->saludar();
```

---

## Archivos y Sesiones

### Escritura y Lectura de Archivos
```php
file_put_contents("archivo.txt", "Hola Mundo");
echo file_get_contents("archivo.txt");
```

### Manejo de Sesiones
```php
session_start();
$_SESSION['usuario'] = "Juan";
echo $_SESSION['usuario'];
```

---



| Función                | Descripción                                                    | Ejemplo de Uso                                                                                                     | Resultado Comentado                                                             |
|------------------------|----------------------------------------------------------------|--------------------------------------------------------------------------------------------------------------------|---------------------------------------------------------------------------------|
| `htmlspecialchars()`   | Convierte caracteres especiales a entidades HTML.            | `echo htmlspecialchars("<a href='test'>Test</a>");`                                                                 | `&lt;a href=&#039;test&#039;&gt;Test&lt;/a&gt;`                                  |
| `strlen()`             | Devuelve la longitud de una cadena.                           | `echo strlen("Hola Mundo");`                                                                                        | `10` (incluye espacios)                                                        |
| `strpos()`             | Busca la posición de la primera aparición de una subcadena.    | `echo strpos("Hola Mundo", "Mundo");`                                                                               | `5` (posición iniciando en 0)                                                   |
| `date()`               | Formatea una fecha/hora local.                                 | `echo date("Y-m-d");`                                                                                               | `2025-02-28` (dependiendo de la fecha actual)                                  |
| `file_get_contents()`  | Lee un archivo y lo devuelve como una cadena.                  | `echo file_get_contents("ejemplo.txt");`                                                                            | Contenido del archivo "ejemplo.txt" (debe existir)                             |
| `json_encode()`        | Convierte un valor de PHP en una cadena JSON.                  | `echo json_encode(["manzana" => "🍎", "platano" => "🍌"]);`                                                         | `{"manzana":"🍎","platano":"🍌"}`                                                |
| `json_decode()`        | Decodifica una cadena JSON a un valor de PHP.                  | `$data = json_decode('{"manzana":"🍎","platano":"🍌"}'); echo $data->manzana;`                                       | `🍎`                                                                          |
| `trim()`               | Elimina espacios en blanco al inicio y final de una cadena.    | `echo trim("  Hola Mundo  ");`                                                                                      | `Hola Mundo` (sin espacios en extremos)                                        |
| `explode()`            | Divide una cadena en un array usando un delimitador.          | `$parts = explode(",", "🍎,🍌,🍊"); print_r($parts);`                                                              | `Array ( [0] => 🍎 [1] => 🍌 [2] => 🍊 )`                                       |
| `implode()`            | Une elementos de un array en una cadena usando un delimitador. | `$str = implode("-", ["🍎", "🍌", "🍊"]); echo $str;`                                                               | `🍎-🍌-🍊`                                                                     |
| `substr()`             | Extrae una parte de una cadena.                                | `echo substr("Hola Mundo", 5, 5);`                                                                                  | `Mundo`                                                                       |
| `preg_match()`         | Busca coincidencias en una cadena usando expresiones regulares. | `preg_match("/[0-9]+/", "abc123", $matches); print_r($matches);`                                                   | `Array ( [0] => 123 )`                                                        |
| `var_dump()`           | Muestra información estructurada sobre una variable.           | `var_dump(["manzana" => "🍎", "platano" => "🍌"]);`                                                                 | `array(2) { ["manzana"]=> string(4) "🍎", ["platano"]=> string(4) "🍌" }`       |
| `str_replace()`        | Reemplaza todas las apariciones de una subcadena por otra.       | `echo str_replace("mundo", "PHP", "Hola mundo");`                                                                  | `Hola PHP` (la búsqueda es sensible a mayúsculas/minúsculas)                    |
| `array_rand()`         | Obtiene una o más claves aleatorias de un array.               | `$array = ["🍎", "🍌", "🍊", "🍇", "🍓"]; echo array_rand($array);`                                                  | Clave aleatoria del array, por ejemplo `2`                                      |
| `random_int()`         | Genera un número entero aleatorio dentro de un rango especificado. | `echo random_int(1, 100);`                                                                                          | Un número aleatorio entre 1 y 100, por ejemplo `57`                             |
| `rand()`               | Genera un número entero aleatorio (deprecado en algunas versiones). | `echo rand(1, 100);`                                                                                                 | Un número aleatorio entre 1 y 100, por ejemplo `73`                             |
