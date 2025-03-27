<? alerta('lista.php cargado'); ?>


<div id="puntos_interes">
        <h2>Lista de puntos de interés en Asturias</h2>
        <button onclick="cambiar()">Cambiar vista</button>
        <ul id="galeria">
    
        <?php

        $miJSON = file_get_contents('datos.json');

        $datos= json_decode($miJSON,true);

        foreach($datos as $dato){
            echo '<li>';
            echo '<h2>'.$dato['lugar'].'</h2>';
            echo '<img src="img/'.$dato['img'].'">';
            echo '<p>'.$dato['texto'].'</p>';
            echo '</li>';
        }

        ?>

            
        </ul>
    </div>