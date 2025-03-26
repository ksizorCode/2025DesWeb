<?php

// Miguel
//Array que  que almacena todos los datos

$dato =[
    'lang'=>"es",
    'titulo'=>"Rhojan",
    'webtitulo'=>"Rhojan",
    'subtitulo'=>'La última película del estudio Warner Broders promete una buena dosis de nostalgia a los fans del comic de DC.',
    'txt1'=>'Han pasado más de 34 años desde que Tim Burton estrenó la primera adaptación cinematográfica del super heroe de la negra capa. ',
    'txt2'=>'Lorem ipsum dolor 2',
    'txt3'=>'Otro lorem ipsum dolor',
    'img1'=>'001.jpg',
    'img2'=>'002.jpg',
    'img3'=>'003.jpg',
    'menu'=>[
            ['Inicio','index.php',0],
            ['Películas','peliculas.php',0],
            ['Cartelera','cartelera.php',1]
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