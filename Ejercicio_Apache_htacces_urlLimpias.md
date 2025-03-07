# ✂️ URLs Lipias con Apache + HTACCESS + Base de Datos

1. Crea un nuevo servidor en `Local` (para que no interfiera con otros desarrollos)
2. Activa **Apache** (.htaccess sólo funciona en apache)
3. Crea una estructura básica de web sin complicarte mucho:
    - **index.php**
        - include a header
        - listado de productos (conexión base de datos y bucle)
    - **_header.php**
        - elementos de apertura del HTML
        - elementos del navegación de la cabecera
    - **ficha.php**
        - muestra información del producto individual

---
#Programación:



## BLOQUES 
Elementos reutilizables escructuras o bloques de código HTML.
Como el header, footer, aside, etc:
- El _header.php contiene la apertura del HTML y la cabecera de la web y se carga en todos los apartados.
- El _footer.php contiene el footer y el cierre del HTML y también se carga en todos los apartados.
- El _asside.php (no existen este caso) pero podría ser la columna lateral de un apartado blog (por ejemplo).

### `_header.php`
Programación para el bloque de la cabecera reutilizado en todos los apartados
```php
<? const TITULOWEB='Mi web de Productos'?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=TITULO?></title>
</head>
<body>

<header>
    <nav>
        <ul>
            <li> <a href="inicio">Inicio</a></li>
            <li> <a href="contacto">Contacto</a></li>
        </ul>
    </nav>
</header>

<main>
    <h1><?=TITULO?></h1>
```


## `_footer.php`
Programación para el bloque pie reutilizado en todos los apartado:
```php
</main>
<footer>
    <p>&Copy; Copyright <?=date('Y')?> <?=TITULOWEB?></p>
</footer>
</body>
</html>
```


##  APARTADOS
Serían cada una de las secciones de la página web

### `index.php`
```php
<? const TITULO ='Inicio'?>
<?php include '_header.php' ?>

<!-- Aquí el contenido del apartado -->

<?php include '_footer.php' ?>
```

### `contacto.php`
```php
<? const TITULO ='Contacto'?>
<?php include '_header.php' ?>

<!-- Aquí el contenido de contacto-->
<h2>Ver a conocernos</h2>
<address>
C/ Corrida 55 Gijón Asturias
</address>
<a href="tel:985555555">985555555</a>

<?php include '_footer.php' ?>
```

### `ficha.php`
```php
<? const TITULO ='Ficha de producto'?>
<?php include '_header.php' ?>

<!-- Aquí irá el contenido de la ficha de producto-->

<?php include '_footer.php' ?>
```


---
## Conexión con la Base de Datos

Vamos a actualizar los contenidos para que se conecten con la base de datos:
Volvemos al `index.php`:
#### index.php
```php
<? const TITULO ='Inicio'?>
<?php include '_header.php' ?>

<!-- Aquí el contenido del apartado -->
<?php
<? const TITULO ='Ficha Producto'?>
<?php include '_header.php' ?>

<!-- Aquí el contenido del apartado -->


$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "tienda";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM productos";
$result = mysqli_query($conn, $sql);

echo '<ul>';

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "<li><a href='{$row['slug']}'>{$row["nombre"]}"</a></li>";
  }
} else {
  echo "0 results";
}
echo '</ul>';

mysqli_close($conn);
?>

<!-- Footer y cierre-->
<?php include '_footer.php' ?>

```

#### ficha.php
Actualizamos la programación en ficha para que nos muestre los datos de cada producto:
```php

//Capturar GET con valor slug para meter en la consulta

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "tienda";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM productos";
$result = mysqli_query($conn, $sql);

echo '<ul>';

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "<li><a href='{$row['slug']}'>{$row["nombre"]}"</a></li>";
  }
} else {
  echo "0 results";
}
echo '</ul>';

mysqli_close($conn);
?>

<!-- Footer y cierre-->
<?php include '_footer.php' ?>



```




---


## .htaccess
Creamos el arhivo `.htaccess`. Recuerda que tienes que activar Apache para que esto funcine.

```apache

# Redirección a web de error 404
RewriteEngine On
ErrorDocument 404 /error.php



#Redirección a URLs limpias
RewriteRule ^inicio$ index.php [L]
RewriteRule ^contacto$ contacto.php [L]


# Limpiar URL de producto que llega por parámetro GET

# Redirigir URLs limpias a ficha.php con el slug
RewriteRule ^productos/([^/]+)/?$ ficha.php?slug=$1 [L,QSA]
# Apartir de ahora la dirección para un producto por ejemplo nevera-americana será:
# miweb.com/producto/nevera-americana
# pero internamente estará apuntando de forma oculta a:
# miweb.com/ficha.php?slug=nevera-americana






