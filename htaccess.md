# .htaccess
## ¿Qué es .htaccess?
El archivo  `.htaccess` es un archivo configuración utilizado por los servidores **Apache**.
Entre sus usos se encuentran:

- Redireccionamientos: Como el ejemplo para el error 404.
- Reescritura de URLs: Para generar rutas más amigables y optimizadas para el posicionamiento web (SEO).
- Control de acceso: Bloqueo de IPs, autenticación, entre otros.
- Configuración de caché: Mejorando la velocidad de carga del sitio.



## Error 404
En el caso de querer que cualquier dirección incorrecta en nuestra web lance el archivo 404 se utilizará el siguiente código:

```htaccess
# Redireccionar al archivo que se mostrará en caso de error 404
RewriteEngine On
ErrorDocument 404 /error.php
```

## Reescritura a URL limpia
En ciertas ocuasiones nos podemos encontrar con rutas de URLs con extensiones de archivos o estructuras poco amigables de cara al posicionamiento SEO.
En esos casos podemos reconvertir cosas tipo:
Tenemos esta url un poco fea:
- `https://miweb.com/productos/playeros-rojos.php`
- `https://miweb.com/productos/864545.php`
- `https://miweb.com/productos?procuto=playero-34554`
- 
Podemos reconvertirlo a una estrucuta como estas:
- `https://miweb.com/productos/deporte/tenis/playeros/adidas/running-air-4200`
- `https://miweb.com/productos/playeros-rojos`

Veamos su uso.
Siendo la estructura de carpetas la siguiente, haremos el código que figura continuación para generar unas URLs amigables o limpias de cara al posicionamiento:

```
Proyecto/
│  
├── .htaccess
├── apartado-contacto-de-nuestra-empresa.php
├── index.php
├── productos.php
├── s.php
├── login.php
└── assets/
    └── apartados/
        └── serv550.php
```
`.htaccess`
```htaccess
#redirección
RewriteEngine On
RewriteRule ^inicio$ index.php [L]
RewriteRule ^productos$ productos.php [L]
RewriteRule ^servicios$ s.php [L]
RewriteRule ^/acceso/clientes/premium$ login.php [L]
RewriteRule ^servicios$  assets/apartados/serv550.php [L]
RewriteRule ^contacto$  apartado-contacto-de-nuestra-empresa.php [L]
```
Las rutas a los enlaces de navegación por lo tanto apuntarán a las nuevas URLs limpias:

```html
<nav>
    <ul>
    <li><a href="inicio">Inicio</a></li>
    <li><a href="productos">Productos</a></li>
    <li><a href="servicios">Servicios</a></li>
    <li><a href="contacto">Contacto</a></li>
    <li><a href="/acceso/clientes/premium">Acceso</a></li>
    </ul>
</nav>
```



## Control de Acceso
Podemos bloquear el acceso a un apartado (carpeta o subdirectorio) de nuestra web con usuario y contraseña o limitar el acceso desde IPs determinadas.



