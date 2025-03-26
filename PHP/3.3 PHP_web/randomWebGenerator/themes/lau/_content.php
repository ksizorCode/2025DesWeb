<?php
// Laura
//Array que  que almacena todos los datos

$dato =[
    'lang'=>'es-ES',
    'webtitulo'=>"Cantantes-actores",
    'titulo'=>"Cantando bajo la lluvia",
    'subtitulo'=>'Una pelicula de Gene Kelly en sus mejores tiempos',
    'txt1'=>'Cantando bajo la lluvia cuyo titulo oringinal es Singing in the Rain es una película musical de 1952 dirigida por Gene Kelly y Stanley Donen. Está protagonizada por Gene Kelly, Donald OConnor y Debbie Reynolds.',
    'txt2'=>'La película fue un gran éxito gracias a sus escenas de baile, en especial la de Gene Kelly bajo la lluvia, cuando canta la canción que da título al filme. Se estrenó en abril y fue la película más taquillera durante ese mes y la décima de 1952. ',
    'txt3'=>' En su argumento Don Lockwood es una romántica estrella del cine mudo a quien ha costado mucho llegar a la cima. Hasta llegar a triunfar en Hollywood ha llevado un largo camino en el vodevil en compañía de su amigo íntimo y socio sobre el escenario el comediante Cosmo Brown. Ahora forma pareja artística con otra estrella de la pantalla Lina Lamont, una bella chica, no tan tonta como parece, pero bastante turbia en sus intenciones. ',
    'img1'=>'themes/lau/img/001.jpg',
    'img2'=>'themes/lau/img/002.jpg',
    'img3'=>'themes/lau/img/003.jpg',
    'menu'=>[
            ['Home','index.php',0],
            ['Musicales','peliculas.php',0],
            ['Cartelera','cartelera.php',0],
            ['facebook','https://facebook.com',1]
            ]
    ]
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
?>