<?php


// 1. Miramos si hay algún dato en el GET
if(isset( $_GET['nombreOrgano'])){
    $datoGET = $_GET['nombreOrgano'];
    🤬($datoGET) ;
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=º, initial-scale=1.0">
    <title>Document</title>
    <style>
        .debug{
            border: solid coral 2px;
            border-radius:20px;
            padding: 20px;
            font-family: monospace;
            color:coral;
        }
       
    </style>
</head>
<body>
    
<h1>Abrir y guardar JSON</h1>


<form action="json2.php" method="get">
    <label>
        Nombre órgano:
        <input type="text" name="nombreOrgano">
    </label>
    <input type="submit" value="Añadir Organo al JSON">
</form>



<?php



// DEBUG 
$debug=0;

function 🤬($v , $formato='variable'){
    global $debug;

    if($debug){

        switch($formato){
            case 'variable':
                echo '<div class="debug">EL VALOR ES: <strong> '.$v.'</strong> </div>';    
            break;
            case 'array':
            case 'print_r':
            case 'printr':
            case 'pepito':
                echo '<div class="debug">';
                echo '<pre>';
                    print_r($v);
                echo '</pre>';
                echo '</div>';    
            break;
        }
    }
}
//------------------


//ABRIR DATOS DEL json + Decodificarlos + Mostrarlos en una lista

// 2. Cargamos el Archivo JSON
$archivo='richar.json';

if(file_exists($archivo)){
    $importar = file_get_contents($archivo);
    // 3. Decodificar JSON y convertirlo en un Array PHP
    $miArray = json_decode($importar,true);
}

// 4. Añadir el nuevo dato al final del Array

    if(!$datoGET==''){

    //añadir a $miArray el dato obtenido por GET
    array_push($miArray['organos'],Array('nombre'=>$datoGET));
    
   // 🤬($miArray, 'print_r');
}






// 5. IMPRIMIMOS EL ARRAY  Mostramos los datos en una lista HTML
echo '<ul>';
    foreach($miArray['organos'] as $org){
        echo "<li>{$org['nombre']}</li>";
    }
echo '</ul>';


// 6. Convertismo el Array en formato JSON

$nuevoJSON = json_encode($miArray,  JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

// 7. Guardamos el JSON

file_put_contents($archivo,$nuevoJSON);





?>




</body>
</html>