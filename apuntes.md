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

| Tipo | Descripción | Ejemplo |
|------|------------|---------|
| `string` | Texto | `$nombre = "Juan";` |
| `int` | Número entero | `$edad = 25;` |
| `float` | Número decimal | `$precio = 10.99;` |
| `bool` | Booleano | `$activo = true;` |
| `array` | Arreglo | `$colores = ["rojo", "azul"];` |
| `object` | Objeto | `$persona = new Persona();` |

---

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

## 🚀 Contribuciones

Si quieres contribuir, ¡envía un pull request!

## 📜 Licencia

Este proyecto está bajo la licencia MIT.
