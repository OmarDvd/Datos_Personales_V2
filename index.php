<?php

/* Cargamos funciones */
require_once("funciones.php");

/* Comprobamos que el archivo usuario.ini no existe para crearlo */
if (!file_exists("usuarios.ini")) {
    $archivoUsuario = fopen("usuarios.ini", "w");
    fwrite($archivoUsuario, "[usuario]" . PHP_EOL);
    fclose($archivoUsuario);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>


<?php

/* Comprobamos que la venimos de login o que venimos de registrar */

/* Si venimos de LOGIN*/
if (isset($_POST['login'])) {
    if(existeUsuarioContrasena("usuarios.ini", $_POST['usuario'],$_POST['password'])){
        session_start();
        $_SESSION['usuario']=$_POST['usuario'];
        header("Location: editar.php");
    }else{
        ?> <h3>ERROR. NO Existe el usuario <?php echo $_POST['usuario']; ?> o la contraseña no es correcta, prueba de nuevo a iniciar sesión</h3> <?php
    }
}



    /* Si venimos de registrar*/
    if (isset($_POST['registrar'])) {
        /* Comprobamos con una funcion booleana que el usuario existe.
    True es que existe y por tanto no podremos registrarlo,
    redirigiéndolo a registro de nuevo*/
        
        if (!existeUsuario("usuarios.ini", $_POST['usuario'])) {
            $anadeUsuario = fopen("usuarios.ini", "a");
            fwrite($anadeUsuario, $_POST['usuario'] . "=" . $_POST['password'] . PHP_EOL);
            fclose($anadeUsuario);

            /*Creamos un directorio personal*/
            $directorio = $_POST['usuario'] . "_Directorio";
            mkdir($directorio);
            $archivoDatosPersonales = fopen($directorio . "/datosPersonales" . $_POST['usuario'] . ".ini", "w");
            fwrite($archivoDatosPersonales, "[nombre]" . PHP_EOL);
            fwrite($archivoDatosPersonales, $_POST['nombre'] . PHP_EOL);

            fwrite($archivoDatosPersonales, "[fNacimiento]" . PHP_EOL);
            fwrite($archivoDatosPersonales, "" . $_POST['fNacimiento'] . PHP_EOL);

            fwrite($archivoDatosPersonales, "[intereses]" . PHP_EOL);
            fwrite($archivoDatosPersonales, $_POST['intereses'] . PHP_EOL);

            fwrite($archivoDatosPersonales, "[provincia]" . PHP_EOL);
            fwrite($archivoDatosPersonales, $_POST['provincia'] . PHP_EOL);
            fclose($archivoDatosPersonales);


            /*Creamos el fichero personal para alojar en el directorio*/
        } else {
    ?> <h1>ERROR. Existe el usuario <?php echo $_POST['usuario']; ?> , prueba con otro</h1>
            <a href="registrar.php">Pincha aqui para registrarte de nuevo con otro usuario</a>
    <?php

        }
    }

    if(isset($_POST['editar'])){
            $directorio = $_POST['usuario'] . "_Directorio";

            $archivoDatosPersonales = fopen($directorio . "/datosPersonales" . $_POST['usuario'] . ".ini", "w");

            fwrite($archivoDatosPersonales, "[nombre]" . PHP_EOL);
            fwrite($archivoDatosPersonales, $_POST['nombre'] . PHP_EOL);

            fwrite($archivoDatosPersonales, "[fNacimiento]" . PHP_EOL);
            fwrite($archivoDatosPersonales, "" . $_POST['fNacimiento'] . PHP_EOL);

            fwrite($archivoDatosPersonales, "[intereses]" . PHP_EOL);
            fwrite($archivoDatosPersonales, $_POST['intereses'] . PHP_EOL);

            fwrite($archivoDatosPersonales, "[provincia]" . PHP_EOL);
            fwrite($archivoDatosPersonales, $_POST['provincia'] . PHP_EOL);
            fclose($archivoDatosPersonales);

        header("Location: despedida.php");
    }

    ?>







    <form action="index.php" method="POST">
        <p><label for="usuario">Usuario</label></p>
        <p><input type="text" name="usuario" required></p>

        <p><label for="password">Contraseña</label></p>
        <p><input type="password" name="password" required></p>

        <p><input type="submit" name="login" value="Login"></p>
    </form>

    <form action="registrar.php" method="POST">
        <p><input type="submit" value="Quiero registrarme">
    </form>
</body>

</html>