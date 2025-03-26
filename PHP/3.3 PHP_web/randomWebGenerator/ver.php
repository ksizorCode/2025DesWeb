<? 
if(isset($_GET['nombre'])){
    $theme = $_GET['nombre'];
}
?>

<? require 'config.php'; ?>
<? contenido($theme)?>
<?
//Carga aleatoria de contenido
/*
echo 'Vamos a cargar: themes/'.$theme.'/_content.php';
include 'themes/'.$theme.'/_content.php';*/
?>




<link rel="stylesheet" href="<? echo 'themes/'.$theme.'/style.css?v='.date('U');?>">


<a href="index.php">Volver a random theme</a><br>
<a href="ver2.php">Ver Configurador de partes de theme</a><br>
<form action="ver.php" method="get">
    <select name="nombre" id="nombre">
        <option>Seleccione un theme</option>
        <? foreach($casos as $caso){
            echo '<option name="'.$caso.'">';
            echo $caso;
            echo '</option>';
        }?>
    </select>
    <input type="submit" value="Cargar">

</form>







<? include 'themes/'.$theme.'/header.php';?>



<? include 'themes/'.$theme.'/main.php';?>

<? include 'themes/'.$theme.'/footer.php';?>
<!-- inserción forzada de CSS -->
<link rel="stylesheet" href="<? echo 'themes/'.$theme.'/style.css?v='.date('U');?>">
