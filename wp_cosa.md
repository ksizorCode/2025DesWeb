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



## Funciones para trabajar con entradas (posts)

### 📌 Obtener información de una entrada

```php
get_the_title( $post_id );
```

| Función                        | Descripción                                                            | Ejemplo                                                                                                                                                  |
|--------------------------------|------------------------------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------|
| get_the_title()                | Obtiene el título de la entrada actual.                                | echo get_the_title();                                                                                                                                    |
| get_permalink()                | Obtiene la URL de la entrada actual.                                   | echo get_permalink();                                                                                                                                    |
| get_the_content()              | Obtiene el contenido de la entrada actual.                             | echo get_the_content();                                                                                                                                  |
| get_the_post_thumbnail()       | Obtiene la imagen destacada (thumbnail) de la entrada.                 | echo get_the_post_thumbnail();                                                                                                                           |
| has_post_thumbnail()           | Comprueba si la entrada tiene una imagen destacada.                    | if ( has_post_thumbnail() ) { echo 'Tiene imagen destacada'; }                                                                                           |
| get_the_category()             | Obtiene las categorías asignadas a la entrada.                         | $categories = get_the_category(); foreach($categories as $cat) { echo $cat->name . ' '; }                                                                 |
| get_the_tags()                 | Obtiene las etiquetas asignadas a la entrada.                          | $tags = get_the_tags(); if($tags) { foreach($tags as $tag) { echo $tag->name . ' '; } }                                                                     |
| get_the_terms()                | Obtiene los términos de una taxonomía específica para la entrada.       | $terms = get_the_terms( $post->ID, 'taxonomy' ); if($terms) { foreach($terms as $term) { echo $term->name . ' '; } }                                         |






