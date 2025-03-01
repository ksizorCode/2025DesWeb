# 📌 Funciones habituales de WordPress

📋 Funciones básicas de WordPress

📌 Obtener información del sitio


```php
get_bloginfo( $show );
```

| Función                          | Descripción                                        | Ejemplo                                      |
|----------------------------------|----------------------------------------------------|----------------------------------------------|
| get_bloginfo('name')             | Obtiene el nombre del sitio.                       | echo get_bloginfo('name');                   |
| get_bloginfo('description')      | Obtiene la descripción del sitio.                  | echo get_bloginfo('description');            |
| get_bloginfo('url')              | Obtiene la URL del sitio.                          | echo get_bloginfo('url');                    |
| get_bloginfo('language')         | Obtiene el lenguaje del sitio.                     | echo get_bloginfo('language');               |
| get_bloginfo('charset')          | Obtiene la codificación de caracteres (ej. UTF-8).   | echo get_bloginfo('charset');                |
| get_bloginfo('version')          | Obtiene la versión de WordPress instalada.         | echo get_bloginfo('version');                |