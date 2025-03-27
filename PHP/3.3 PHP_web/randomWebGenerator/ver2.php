<? 

$header ="undefined";
$main ="undefined";
$footer ="undefined";
$style ="undefined";
$content ="undefined";

if(isset($_GET['header'])){
    $header = $_GET['header'];
}

if(isset($_GET['main'])){
    $main = $_GET['main'];
}

if(isset($_GET['footer'])){
    $footer = $_GET['footer'];
}

if(isset($_GET['style'])){
    $style = $_GET['style'];
}

if(isset($_GET['content'])){
    $content = $_GET['content'];
}
?>

<? require 'config.php'; ?>


<link rel="stylesheet" href="<? echo 'themes/'.$theme.'/style.css?v='.date('U');?>">


<? function selecthtml($v, $b){
    global $casos;

    echo '<label for="'.$v.'">'.$v.'</label>';
    echo '<select name="'.$v.'" id="'.$v.'">';
    echo '<option>Seleccione un theme</option>';
    foreach($casos as $caso){
        echo '<option name="'.$caso.'"';
        if($caso == $b){
            echo "selected";
        }
        echo '>';
        echo $caso;
        echo '</option>';
    }
    echo '</select><br>';

}?>

<a href="index.php">Volver a random theme</a>
<form action="ver2.php" method="get">
    <? selecthtml('header', $header);?>
    <? selecthtml('main', $main);?>
    <? selecthtml('footer', $footer);?>
    <? selecthtml('style', $style);?>
    <? selecthtml('content',$content);?>

    <input type="submit" value="Cargar">

</form>







<? include 'themes/'.$content.'/_content.php';?>
<? include 'themes/'.$header.'/header.php';?>
<? include 'themes/'.$main.'/main.php';?>
<? include 'themes/'.$footer.'/footer.php';?>
<!-- inserción forzada de CSS -->
<link rel="stylesheet" href="<? echo 'themes/'.$style.'/style.css?v='.date('U');?>">
