# URLs Lipias con Apache + HTACCESS + Base de Datos

1. Crea un nuevo servidor en Local (para que no interfiera con otros desarrollos)
2. Activa Apache (.htaccess sólo funciona en apache)
3. Crea una estructura básica de web sin complicarte mucho:
    - index.php
        - include a header
        - listado de productos (conexión base de datos y bucle)
    - _header.php
        - elementos de apertura del HTML
        - elementos del navegación de la cabecera
    - ficha.php
        - muestra información del producto individual
