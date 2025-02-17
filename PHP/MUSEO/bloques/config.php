<?php

$debug= 0;

function _debug($message){
    global$debug;
    if($debug)
    {
        echo '<div class="debug">';
        echo $message;
        echo '</div>';
    }

}

_debug('estás en modo desarrollo');
  


//mostrar el array
function debugPrint_r($array){
    global $debug;
    if($debug)
    {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }
}


function cargarJSON($archivo){
        // cargar el JSON
    if (file_exists($archivo))
    {
        $miJSON=file_get_contents($archivo);
        $miArray=json_decode($miJSON,'true');
        return $miArray;
    }
    else{
        echo "No hemos guardado nada";
    }
        
}

/**** hasta aquí luego pa config.php */




// INICIO DE SESIÓN -------

session_start();   // Iniciamos comprobación de sesión

if(isset($_SESSION['logueado'])){
    echo "<p>✅ Bienvenido; Has iniciado sesión.</p>";
    $logueado=true;
}
else{
    echo "<p>⛔ No has iniciado sesión.</p>";
    $logueado=false;
}

//echo $saludo = isset($_SESION['logueado']) ? "tas dentro" : "tas fuera";





?>