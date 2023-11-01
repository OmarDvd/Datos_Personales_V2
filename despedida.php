<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Despedida</title>
</head>
<body>
    <h1>Has cerrado sesión <?php  echo $_SESSION['usuario']  ?> </h1>
    <?php
    session_unset();
    session_destroy();
?>

<a href="index.php">Volver a página de login/registrarse</a>
</body>
</html>