<?php

// Eric
//Array que  que almacena todos los datos

$dato =[
    'lang'=>'es-ES',

    'webtitulo'=>"Dark web",

    'titulo'=>"Bienvenido a la dark website",

    'subtitulo'=>'La dark web o internet oscura es el contenido de la World Wide Web1​ que existe en darknets, redes que se superponen a la internet pública y requieren de software específico y configuraciones o autorización para acceder.',

    'txt1'=>'La dark web a menudo se ha confundido con la web profunda, las partes de la web no indexadas (buscables) por los motores de búsqueda. El término dark web surgió por primera vez en 2009; sin embargo, se desconoce cuándo surgió la verdadera dark web.7​ Muchos usuarios de Internet solo utilizan la web de superficie (surface web), datos a los que puede acceder un navegador web típico.8​ La dark web forma una pequeña parte de la web profunda, pero requiere software personalizado para acceder a su contenido. Esta confusión se remonta al menos a 2009.9​ Desde entonces, especialmente al informar a Silk Road, los dos términos se han mezclado a menudo, a pesar de las recomendaciones de que deberían distinguirse.',

    'txt2'=>'La dark web, también conocida como sitios web de darknet, son accesibles solo a través de redes como Tor (proyecto "The Onion Routing") que se crean específicamente para la dark web.12​ El navegador Tor y los sitios accesibles a Tor son ampliamente utilizados entre los usuarios de darknet y pueden ser identificados por el dominio ".onion". Los navegadores Tor crean puntos de entrada y rutas cifradas para el usuario, lo que permite que sus búsquedas y acciones en las web oscuras sean anónimas.',

    'txt3'=>'Las identidades y ubicaciones de los usuarios de darknet permanecen anónimas y no se pueden rastrear debido al sistema de cifrado por capas. La tecnología de cifrado darknet enruta los datos de los usuarios a través de un gran número de servidores intermedios, lo que protege la identidad de los usuarios y garantiza el anonimato. La información transmitida puede ser descifrada sólo por un nodo posterior en el esquema, que conduce al nodo de salida. El complicado sistema hace casi imposible reproducir la ruta del nodo y descifrar la información capa por capa.13​ Debido al alto nivel de cifrado, los sitios web no pueden rastrear la geolocalización y la IP de sus usuarios, y los usuarios no pueden obtener esta información sobre el host. Por lo tanto, la comunicación entre los usuarios de darknet está altamente encriptada, lo que permite a los usuarios hablar, bloguear y compartir archivos de forma confidencial.',

    'img1'=>'001.jpg',
    'img2'=>'002.jpg',
    'img3'=>'003.jpg',
    'menu'=>[
            ['Inicio','index.php',0],
            ['Servicios','servicios.php',0],
            ['Nosotros','nosotros.php',0],
            ['Redes Sociales','https://facebook.com',1]
            ]
    ];

 /*   
echo $dato['txt3'];
echo $dato['img1'];
echo $dato['img2'];
echo $dato['img3'];

foreach($dato['menu'] as $e){
    echo '<ul>';
    echo '<li>';
    echo '<a href="'.$e[1].'">';
    echo $e[0];
    echo '</a>';
    echo '</li>';
    echo '</ul>';
}

*/