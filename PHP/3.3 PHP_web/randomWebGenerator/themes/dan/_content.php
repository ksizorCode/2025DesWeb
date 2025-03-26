<?php

// Miguel
//Array que  que almacena todos los datos

$dato =[
    'lang'=>'es-ES',
    'webtitulo'=>"Fotogramas",
    'titulo'=>"Batman regresa en la última peli de Flash",
    'subtitulo'=>'La última película del estudio Warner Broders promete una buena dosis de nostalgia a los fans del comic de DC.',
    'txt1'=>'Han pasado más de 34 años desde que Tim Burton estrenó la primera adaptación cinematográfica del super heroe de la negra capa. ',
    'txt2'=>'The Flash es una película estadounidense de superhéroes basada en el personaje homónimo de DC Comics. Producida por DC Studios, The Disco Factory y Double Dream y distribuida por Warner Bros. Pictures, pretende ser la decimotercera película del Universo extendido de DC (DCEU). La película está dirigida por Andy Muschietti a partir de un guion de Christina Hodson y está protagonizada por Ezra Miller como Barry Allen / Flash, junto a Ron Livingston, Michael Keaton, Kiersey Clemons, Michael Shannon, Antje Traue, Sasha Calle y Ben Affleck. En The Flash, Allen viaja al pasado para evitar el asesinato de su madre, lo que trae consecuencias no deseadas.

    El desarrollo de una película basada en Flash comenzó en 2004, con varios escritores y directores adjuntos al proyecto hasta 2014. Luego, la película se volvió a desarrollar como parte del DCEU, con Miller elegido como el personaje principal. Varios directores se unieron a la película durante los años siguientes, con Seth Grahame-Smith, Rick Famuyiwa y el dúo de John Francis Daley y Jonathan Goldstein dejando el proyecto debido a diferencias creativas. Muschietti y Hodson se unieron a la película en julio de 2019 y la preproducción comenzó en enero de 2020. La película está influenciada por la historia del cómic Flashpoint, que presenta a varios personajes de DC Comics, incluidos Affleck y Keaton, repitiendo sus respectivas versiones de Batman. El rodaje tuvo lugar de abril a octubre de 2021 en Warner Bros. Studios, Leavesden y en locaciones de todo el Reino Unido.',
    'txt3'=>'Después de ayudar a Bruce Wayne / Batman y Diana Prince / Mujer Maravilla a detener un robo a un banco que salió mal, Barry Allen / Flash vuelve a visitar la casa de su infancia, donde recibe recuerdos de sus padres, Nora y Henry, antes de que mataran a Nora, el crimen del que Henry fue acusado y encarcelado. Superado por sus emociones, Barry accidentalmente viaja en el tiempo más temprano ese día e informa a Bruce al respecto. A pesar de las advertencias de Bruce de que viajar en el tiempo puede tener consecuencias no deseadas, Barry se remonta al día de la muerte de Nora y evita que suceda.

    Cuando Barry intenta volver al presente, termina en un 2013 alternativo donde sus padres están vivos. Encuentra su yo pasado y se da cuenta de que está en el día en que obtiene sus poderes. Los dos Barry van al Departamento de Policía de Ciudad Central donde Barry ayuda a darle al Barry de 2013 sus poderes durante una extraña tormenta, mientras pierde sus propios poderes en el proceso. Mientras Barry lucha por entrenar al Barry de 2013 para usar sus poderes, los dos notan una transmisión del General Zod, que se prepara para invadir la Tierra',
    'img1'=>'https://images.unsplash.com/photo-1678297405489-d25d9f5bdff0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80',
    'img2'=>'https://images.unsplash.com/photo-1678308860535-210ff0f57af6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=464&q=80',
    'img3'=>'https://images.unsplash.com/photo-1678329887232-a48991da8286?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=928&q=80',
    'menu'=>[
            ['Home','index.php',0],
            ['Películas','peliculas.php',0],
            ['Cartelera','cartelera.php',0],
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