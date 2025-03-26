<?
//Listado de todas las carpetas que están dentro de themes
$casos =['ric','fra','ale','jes','lau','mig','bea','xua','dan','dav'];



//Devuelve un valor aleatorio del 0 a la cantidad total de alumnos
function random(){
    global $casos;
    $numElementos = count($casos)-1;

    return rand(0,$numElementos);
}


//Devuelve un nombre de Theme aleatorio de la lista de arriba
function randomTheme(){
    global $casos;
    return $casos[random()];
}

//Carga aleatoria de contenido
//$theme = randomTheme()

//echo 'Vamos a cargar: themes/'.$theme.'/_content.php';
//include 'themes/'.$theme.'/_content.php';




//Cargar elementos via include
// insertar('header');
function insertar($v){
    global $casos ;

    switch($v) {
        // Si es Header o head o html carga header.php
        case 'header':
        case 'head':
        case 'html':
            include 'themes/'.randomTheme().'/header.php';
            break;
        // Si es Footer carga footer.php
        case 'footer':
            include 'themes/'.randomTheme().'/footer.php';
            break;
        // Si es main carga main.php
        case 'main':
            include 'themes/'.randomTheme().'/main.php';
            break;
        // Si es style carga style.css
        case 'style':
            echo '<style>';
            include 'themes/'.randomTheme().'/style.css';
            echo '</style>';
            break;
        
        //Si no es ninguno de los anteriores carga:
        default:
            include 'themes/'.randomTheme().'/'.$v.'.php';
            break;
    }
}




function menu(){
    global $dato;


    echo '<ul class="menu">';
    foreach($dato['menu'] as $e){
        echo '<li>';
        echo '<a href="'.$e[1].'"';

        if($e[2]){
            echo 'target="_blank" ';
        }

        echo '>'.$e[0].'</a>';
        echo '</li>';

    }
    echo '</ul>';  
}









function webtitulo(){
    global $dato;
    echo $dato['webtitulo']; 
}

function titulo(){
    global $dato;
    echo $dato['titulo']; 
}

function subtitulo(){
    global $dato;
    echo $dato['subtitulo']; 
}


function lang(){
    global $dato;
    echo $dato['lang'];
}

// e('txt3');
function e($v){
    global $dato;
    echo $dato[$v];
}



// ruta al tema para el link css
function ruta_a_theme(){
    global $casos;
   echo  'themes/'.$casos[random()].'/style.css';
}



/******************* POR SI ALGUIEN USASE EL SISTEMA ANTIUGO DEL OTRO DÍA ******************** */


/* * * * * * * * * * FUNCIONES * * * * * * * * * * */
function obtener_cabecera(){    insertar('header'); }
function obtener_pie(){         insertar('footer'); }
function el_titulo(){           titulo();           }

//Título del apartado + título de la página:
// Inicio - Mi Página Web

function apartadoyTitulo(){
    global $miTitulo;
    global $miTituloApartado;
    global $separador;

    $titulos= $miTituloApartado." ".$separador." ". $miTitulo;

    echo $titulos;
}

function menuBuilder(){     menu(); }


//Cargar Color y Fuente principal
function mainColor(){
    global $miColor;
    global $miFuente;
    echo "<style>:root{--c:".$miColor."; --ff:".$miFuente.";}</style>";
}

//lanzar función al final de la etiqueta <head>
function finHead(){
mainColor();
}

//lanzar función al final de la etiqueta <footer>
function finFooter(){
}






//Cargar los datos del theme de mig - hasta que el resto de los alumnos mentan los suyos propios
//include 'themes/mig/_content.php';



function contenido($v){
    include 'themes/'.$v.'/_content.php';

  /*  global $casos;
    if((strlen(''.$v)>0)){
        include 'themes/'.$v.'/_content.php';
    }
    else{
       // include 'themes/'.$casos[random()].'/_content.php';
       include 'themes/mig/_content.php';
        } 
        */
         
}


contenido('mig');