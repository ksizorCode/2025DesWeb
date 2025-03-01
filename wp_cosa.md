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

Función,Descripción,Ejemplo
get_the_author(),Obtiene el nombre del autor.,echo get_the_author();



## 📌 Consultar entradas

```php
WP_Query( $args );
```

Realiza consultas personalizadas a la base de datos.

Función,Descripción,Ejemplo
WP_Query($args),Consulta entradas personalizadas.,$query = new WP_Query(['post_type' => 'post', 'posts_per_page' => 5]);







📌 Funciones para trabajar con páginas

Función,Descripción,Ejemplo
wp_list_pages(),Muestra una lista de páginas.,wp_list_pages(['title_li' => '']);

📌 Funciones para menús

Función,Descripción,Ejemplo
wp_nav_menu(),Muestra un menú de WordPress.,wp_nav_menu(['theme_location' => 'main-menu']);

📌 Funciones para trabajar con usuarios

Función,Descripción,Ejemplo
wp_get_current_user(),Obtiene los datos del usuario logueado.,$user = wp_get_current_user(); echo $user->user_login;

📌 Funciones para cargar archivos y scripts

Función,Descripción,Ejemplo
wp_enqueue_script(),Carga un script en el sitio.,wp_enqueue_script('mi-script', get_template_directory_uri().'/js/mi-script.js', [], '1.0', true);

📌 Funciones para trabajar con la base de datos


Función,Descripción,Ejemplo
$wpdb->get_results(),Obtiene datos de la base de datos.,$resultados = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_status = 'publish'");






