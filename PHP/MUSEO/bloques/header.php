<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Museo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>     
<body>
<header> 
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="expo.php">Exposiciones</a></li>
            <li><a href="logout.php">CerrarSesión</a></li>
            <li><a href="contacto.php">Contacto</a></li>

<?php
    if($logueado){
        echo '<li class="login"><a href="login.php"><img src="assets/img/avatar.png"><span>'.$_SESSION["usuario"].'</span></a></li>';
        }
    else{
        echo '<li><a href="login.php">Login</a></li>';
    }
?>

        </ul> 
    </nav>
</header>
<main>