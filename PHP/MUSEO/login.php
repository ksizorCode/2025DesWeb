<? require 'bloques/config.php'; ?>
<? include 'bloques/header.php'; ?>



<?
//Definimos Usuario y Contraseña que han de ser introducidos por el usuario
$usuarioCorrecto  = 'richard';
$passwordCorrecto = 'mate';

//Creamos un array con los datos del usuario
$datosUsuario = [
    [
    'user' => 'Richard',
    'pass' => 'mate',
    'mail' => 'richard@rdfitness.com',
    'role' => 'admin'
    ],
    [
    'user' => 'Daniel',
    'pass' => 'Canva',
    'mail' => 'danic@rdfitness.com',
    'role' => 'usuario'
    ]
];




//Comprobamos si el formulario ha sido rellenado (via POST)
if(isset($_POST['usuario']) && isset($_POST['password'])){
    //Guardamos los datos introducidos por el usuario en variables
   $usuarioIngresado  = $_POST['usuario'];
   $passwordIngresado = $_POST['password'];

   //Mostramos esos datos en Debug
   _debug("El usuario es: $usuarioIngresado <br>");
   _debug("El password es: $passwordIngresado <br>");

   //Comprobamos si el usuario y la contraseñas son correctos
   if($usuarioCorrecto==$usuarioIngresado && $passwordCorrecto==$passwordIngresado){
        //header ('Location: contacto.php');
        include 'bloques/admin.php';

   }
   else{
        echo "<div>Las credenciales son incorrectas <a href='login.php'>Volver a intentar</a></div>";
   }
}

else{
    ?>

    <form action="" method="post" class="form-login">
        <h1>Acceso al depósito del museo</h1>
        <label for="usuario">usuario</label>
        <input type="text" name="usuario" id="usuario">

        <label for="password">password</label>
        <input type="password" name="password" id="password">

        <input type="submit" value="Acceder">
    </form>

<?
}
?>

<? include 'bloques/footer.php'; ?>
    
