<?php

session_start();



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>

<body>
    <h1>Has iniciado sesión <?php  echo $_SESSION['usuario']   ?>  </h1>
    <form action="index.php" method="POST">
        <p><input style="display: none;" type="text" name="usuario" readonly value="<?php  echo $_SESSION['usuario'] ?>"></p>








        <p><label for="nombre">Nombre</label></p>
        <p><input type="text" name="nombre" required></p>

        <p><label for="fNacimiento">Fecha de nacimiento</label></p>
        <p><input type="date" name="fNacimiento" required></p>

        <p><label for="intereses">Intereses</label></p>
        <p><input type="text" name="intereses" required></p>

        <select name="provincia">
            <option value="jaen">Jaén</option>
            <option value="malaga">Málaga</option>
            <option value="sevilla">Sevilla</option>
            <option value="cadiz">Cádiz</option>
            <option value="huelva">Huelva</option>
            <option value="almeria">Almería</option>
            <option value="cordoba">Córdoba</option>
            <option value="granada">Granada</option>
        </select>

        <p><input type="submit" name="editar" value="editar y cerrar sesion"></p>
    </form>
</body>

</html>