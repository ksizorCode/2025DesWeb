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




## _header.php
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
    <h1><?=TITULO?>
```


## _footer.php
Programación para el bloque pie reutilizado en todos los apartado:
```php
</main>
<footer>
    <p>&Copy; Copyright <?=date('Y')?> <?=TITULOWEB?></p>
</footer>
</body>
</html>
```


## index.php
```php
<? const TITULO ='Inicio'?
<?php include '_header.php' ?>



<?php include '_footer.php' ?>
```
