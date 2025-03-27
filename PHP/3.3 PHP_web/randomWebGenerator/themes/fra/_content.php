<?php

// Fran
//Array que  que almacena todos los datos

$dato =[
    'lang'=>'es-ES',
    'webtitulo'=>"Mundo Coches",
    'titulo'=>"Seat Ibiza",
    'subtitulo'=>'El mejor utilizatrio de la historia de la automoción',
    'txt1'=>'Han pasado más de 40 años desde la fabricación del primer coche y ahí sigue',
    'txt2'=>'El nombre ha sido inspirado en el nombre de una isla de las Isalas Baleares',
    'txt3'=>'El número de fans de este coche es impresionante',
    'img1'=>'themes/fra/img/001.jpg',
    'img2'=>'themes/fra/img/002.jpg',
    'img3'=>'themes/fra/img/003.jpg',
    'menu'=>[
            ['Home','index.php',0],
            ['Historia','historia.php',0],
            ['Fotos','fotos.php',0],
            ['facebook','https://facebook.com',1]
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