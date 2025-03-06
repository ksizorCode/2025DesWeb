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
└── productos.php
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
RewriteRule ^servicios$  assets/apartados/serv550.php [L]
RewriteRule ^contacto$  apartado-contacto-de-nuestra-empresa.php [L]
```


## Control de Acceso
Podemos bloquear el acceso a un apartado (carpeta o subdirectorio) de nuestra web con usuario y contraseña.

```htaccess



```


------

CHAT GPT
----

Ejemplos de uso para generar URLs limpias
Ejemplo 1: Redirección de URLs con parámetros a URLs amigables
Supongamos que tenemos una URL tradicional con parámetros, por ejemplo:
/producto.php?id=123

Podemos reescribirla a una URL amigable, como:
/producto/123


El siguiente código se encarga de traducir la URL amigable a la consulta real del archivo PHP:

htaccess
Copiar
Editar
RewriteEngine On

# Regla para reescribir URLs amigables para productos
RewriteRule ^producto/([0-9]+)/?$ /producto.php?id=$1 [L,QSA]
Explicación de la regla:

RewriteEngine On: Activa el motor de reescritura.
^producto/([0-9]+)/?$: Define la estructura de la URL amigable. El patrón captura números (ID del producto).
/producto.php?id=$1: Redirige internamente a producto.php pasando el ID capturado.
[L,QSA]: [L] indica que es la última regla a aplicar y [QSA] añade cualquier query string adicional.
Ejemplo 2: URL amigable para una sección de blog
Considera una URL original:
/blog.php?categoria=tecnologia&post=456

Podemos reescribirla a:
/blog/tecnologia/456

htaccess
Copiar
Editar
RewriteEngine On

# Regla para reescribir URLs amigables para el blog
RewriteRule ^blog/([a-zA-Z0-9_-]+)/([0-9]+)/?$ /blog.php?categoria=$1&post=$2 [L,QSA]
Explicación de la regla:

^blog/([a-zA-Z0-9_-]+)/([0-9]+)/?$: Captura la categoría y el ID del post.
/blog.php?categoria=$1&post=$2: Redirige internamente a blog.php con los parámetros correspondientes.
Alternativas para la configuración
A continuación se muestra una tabla con distintos escenarios y alternativas de implementación:

Objetivo	URL Amigable	Archivo destino	Código .htaccess
Error 404 personalizado	N/A	/error.php	htaccess<br>RewriteEngine On<br>ErrorDocument 404 /error.php<br>
Reescribir URL de producto	/producto/123	/producto.php?id=123	htaccess<br>RewriteEngine On<br>RewriteRule ^producto/([0-9]+)/?$ /producto.php?id=$1 [L,QSA]<br>
Reescribir URL del blog (categoría y post)	/blog/tecnologia/456	/blog.php?categoria=tecnologia&post=456	htaccess<br>RewriteEngine On<br>RewriteRule ^blog/([a-zA-Z0-9_-]+)/([0-9]+)/?$ /blog.php?categoria=$1&post=$2 [L,QSA]<br>
Forzar el uso de HTTPS	N/A	N/A	htaccess<br>RewriteEngine On<br>RewriteCond %{HTTPS} off<br>RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]<br>
Eliminar www (redirección sin www)	N/A	N/A	htaccess<br>RewriteEngine On<br>RewriteCond %{HTTP_HOST} ^www\.(.*)$ [NC]<br>RewriteRule ^(.*)$ http://%1/$1 [L,R=301]<br>
Diagrama Mermaid: Flujo de Reescritura y Redirección
A continuación, se muestra un diagrama que ilustra el flujo básico de cómo funciona la reescritura de URLs con .htaccess:

```mermaid

flowchart TD
    A[Usuario solicita URL amigable]
    B[.htaccess analiza la URL]
    C{¿Coincide con alguna regla?}
    D[Aplicar la regla de reescritura]
    E[Redirigir al recurso interno (por ejemplo, producto.php)]
    F[Mostrar contenido al usuario]
    
    A --> B
    B --> C
    C -- Sí --> D
    D --> E
    E --> F
    C -- No --> F

```    
Explicación del diagrama:

El usuario solicita una URL amigable.
El archivo .htaccess analiza la URL solicitada.
Se verifica si la URL coincide con alguna regla de reescritura.
Si hay coincidencia, se aplica la regla y se redirige internamente al recurso real (como producto.php o blog.php).
El servidor entrega el contenido correcto al usuario.
Conclusión
El archivo .htaccess es una herramienta poderosa para controlar el comportamiento del servidor Apache, permitiendo desde redirecciones y manejo de errores hasta la creación de URLs amigables que favorecen el SEO. Los ejemplos anteriores muestran cómo puedes transformar URLs con parámetros en rutas limpias y fáciles de recordar, y la tabla te ofrece alternativas adicionales para diversos escenarios. El diagrama Mermaid ayuda a visualizar el proceso de reescritura y redirección, facilitando la comprensión del flujo interno.

Estas configuraciones se pueden adaptar y combinar según las necesidades específicas de tu proyecto, ofreciendo múltiples alternativas para lograr una estructura de URLs óptima.
